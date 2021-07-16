<?php

namespace DaydreamLab\Observer\Controllers\RequestLog\Admin;

use DaydreamLab\Observer\Controllers\ObserverController;
use DaydreamLab\Observer\Requests\RequestLog\Admin\RequestLogAdminSearchRequest;
use DaydreamLab\Observer\Resources\RequestLog\Admin\Collections\RequestLogAdminListResourceCollection;
use DaydreamLab\Observer\Resources\RequestLog\Admin\Models\RequestLogAdminResource;
use DaydreamLab\Observer\Services\RequestLog\Admin\RequestLogAdminService;
use Throwable;

class RequestLogAdminController extends ObserverController
{
    protected $modelName = 'RequestLog';

    public function __construct(RequestLogAdminService $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }


    public function  getItem($request)
    {
        $this->service->setUser($request->user('api'));
        try {
            $this->service->search($request->validated());
        } catch (Throwable $t) {
            $this->handleException($t);
        }

        return $this->response($this->service->status, $this->service->response, [], RequestLogAdminResource::class);
    }


    public function search(RequestLogAdminSearchRequest $request)
    {
        $this->service->setUser($request->user('api'));
        try {
            $this->service->search($request->validated());
        } catch (Throwable $t) {
            $this->handleException($t);
        }

        return $this->response($this->service->status, $this->service->response, [], RequestLogAdminListResourceCollection::class);
    }
}
