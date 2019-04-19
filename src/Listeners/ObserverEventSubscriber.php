<?php

namespace DaydreamLab\Observer\Listeners;

use DaydreamLab\JJAJ\Helpers\Helper;
use DaydreamLab\JJAJ\Helpers\InputHelper;
use DaydreamLab\Observer\Services\Search\SearchService;
use DaydreamLab\Observer\Services\Unique\UniqueVisitorCounterService;
use DaydreamLab\Observer\Services\Unique\UniqueVisitorService;
use Illuminate\Foundation\Http\Events\RequestHandled;

class ObserverEventSubscriber
{
    protected $uniqueVisitorService;

    protected $uniqueVisitorCounterService;

    protected $searchService;

    public function __construct(UniqueVisitorService        $uniqueVisitorService,
                                UniqueVisitorCounterService $uniqueVisitorCounterService,
                                SearchService               $searchService)
    {
        $this->uniqueVisitorService = $uniqueVisitorService;
        $this->uniqueVisitorCounterService = $uniqueVisitorCounterService;
        $this->searchService = $searchService;
    }

    public function onRequest($event)
    {
        $input = Helper::collect([
            'ip' => $event->request->ip(),
            'ua' => $event->request->header('User-Agent')
        ]);

        if (!$this->uniqueVisitorService->alreadyVisited($input))
        {
            $uv = $this->uniqueVisitorService->store($input);
            $uvc = $this->uniqueVisitorCounterService->updateCounter();

            return $uv && $uvc;
        }

        return true;
    }


    public function onSearch($event)
    {
        if (!InputHelper::null($event->input, 'search'))
        {
            return  $this->searchService->store(Helper::collect([
                'keyword'   => $event->input->search
            ]));
        }

        return true;
    }


    public function subscribe($events)
    {
        $events->listen(
            RequestHandled::class,
            'DaydreamLab\Observer\Listeners\ObserverEventSubscriber@onRequest'
        );

        $events->listen('DaydreamLab\Observer\Events\Search',
            'DaydreamLab\Observer\Listeners\ObserverEventSubscriber@onSearch'
        );
    }
}