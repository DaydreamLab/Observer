<?php

namespace DaydreamLab\Observer\Listeners;

use DaydreamLab\Observer\Models\RequestLog\RequestLog;
use Illuminate\Foundation\Http\Events\RequestHandled;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class ObserverEventSubscriber
{
    public static $hiddenRequestHeaders = [
        'authorization',
        'php-auth-pw',
    ];

    public static $hiddenRequestParameters = [
        'password',
        'password_confirmation',
    ];

    public static $hiddenResponseParameters = [
    ];


    public function __construct()
    {
    }


    /**
     * Determine if the content is within the set limits.
     *
     * @param  string  $content
     * @return bool
     */
    public function contentWithinLimits($content)
    {
        $limit = $this->options['size_limit'] ?? 64;

        return mb_strlen($content) / 1000 <= $limit;
    }


    public function onRequest($event)
    {
        $request = $event->request;
        $response = $event->response;
        $startTime = defined('LARAVEL_START') ? LARAVEL_START : $event->request->server('REQUEST_TIME_FLOAT');
        $user = $request->user('api');

        RequestLog::create([
            'uri' => str_replace($request->root(), '', $request->fullUrl()) ?: '/',
            'method' => $request->method(),
            'controllerMethod'=> optional($event->request->route())->getActionName(),
            'middleware' => array_values(optional($request->route())->gatherMiddleware() ?? []),
            'headers' => $this->headers($request->headers->all()),
            'payload' => $this->payload($this->input($event->request)),
            'responseCode' => $response->getStatusCode(),
            'response' => $this->response($response),
            'duration' => $startTime ? floor((microtime(true) - $startTime) * 1000) : null,
            'memory' => round(memory_get_peak_usage(true) / 1024 / 1024, 1),
            'ip' =>  isset($_SERVER['HTTP_CF_CONNECTING_IP'])
                ? $_SERVER['HTTP_CF_CONNECTING_IP']
                : $request->ip(),
            'created_by' => $user ? $user->id : null,
        ]);
    }


    protected function hideParameters($data, $hidden)
    {
        foreach ($hidden as $parameter) {
            if (Arr::get($data, $parameter)) {
                Arr::set($data, $parameter, '********');
            }
        }

        return $data;
    }


    protected function headers($headers)
    {
        $headers = collect($headers)->map(function ($header) {
            return $header[0];
        })->toArray();

        return $this->hideParameters($headers, self::$hiddenRequestHeaders);
    }


    private function input(Request $request)
    {
        $files = $request->files->all();

        array_walk_recursive($files, function (&$file) {
            $file = [
                'name' => $file->getClientOriginalName(),
                'size' => $file->isFile() ? ($file->getSize() / 1000).'KB' : '0',
            ];
        });

        return array_replace_recursive($request->input(), $files);
    }


    protected function payload($payload)
    {
        return $this->hideParameters($payload, self::$hiddenRequestParameters);
    }


    protected function response(Response $response)
    {
        $content = $response->getContent();

        if (is_string($content)) {
            if (is_array(json_decode($content, true)) &&
                json_last_error() === JSON_ERROR_NONE) {
                return $this->contentWithinLimits($content)
                    ? $this->hideParameters(json_decode($content, true), self::$hiddenResponseParameters)
                    : 'Purged By Telescope';
            }

            if (Str::startsWith(strtolower($response->headers->get('Content-Type')), 'text/plain')) {
                return $this->contentWithinLimits($content) ? $content : 'Purged By Telescope';
            }
        }

        if ($response instanceof RedirectResponse) {
            return 'Redirected to '.$response->getTargetUrl();
        }

        return 'HTML Response';
    }



    public function subscribe($events)
    {
        $events->listen(

            RequestHandled::class,
            'DaydreamLab\Observer\Listeners\ObserverEventSubscriber@onRequest'
        );
    }
}