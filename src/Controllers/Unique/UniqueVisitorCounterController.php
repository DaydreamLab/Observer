<?php

namespace DaydreamLab\Observer\Controllers\Unique;

use DaydreamLab\JJAJ\Controllers\BaseController;
use DaydreamLab\JJAJ\Helpers\ResponseHelper;
use Illuminate\Support\Collection;
use DaydreamLab\Observer\Services\Unique\UniqueVisitorCounterService;
use DaydreamLab\Observer\Requests\Unique\UniqueVisitorCounterOrderingPost;
use DaydreamLab\Observer\Requests\Unique\UniqueVisitorCounterRemovePost;
use DaydreamLab\Observer\Requests\Unique\UniqueVisitorCounterStorePost;
use DaydreamLab\Observer\Requests\Unique\UniqueVisitorCounterStatePost;
use DaydreamLab\Observer\Requests\Unique\UniqueVisitorCounterSearchPost;

class UniqueVisitorCounterController extends BaseController
{
    public function __construct(UniqueVisitorCounterService $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }


    public function getItem($id)
    {
        $this->service->getItem($id);

        return ResponseHelper::response($this->service->status, $this->service->response);
    }


    public function getItems()
    {
        $this->service->search(new Collection());

        return ResponseHelper::response($this->service->status, $this->service->response);
    }


    public function getList()
    {
        $this->service->getList(new Collection());

        return ResponseHelper::response($this->service->status, $this->service->response);
    }


    public function checkout($id)
    {
        $this->service->checkout($id);

        return ResponseHelper::response($this->service->status, $this->service->response);
    }


    public function ordering(UniqueVisitorCounterOrderingPost $request)
    {
        $this->service->ordering($request->rulesInput());

        return ResponseHelper::response($this->service->status, $this->service->response);
    }


    public function remove(UniqueVisitorCounterRemovePost $request)
    {
        $this->service->remove($request->rulesInput());

        return ResponseHelper::response($this->service->status, $this->service->response);
    }


    public function state(UniqueVisitorCounterStatePost $request)
    {
        $this->service->state($request->rulesInput());

        return ResponseHelper::response($this->service->status, $this->service->response);
    }


    public function store(UniqueVisitorCounterStorePost $request)
    {
        $this->service->store($request->rulesInput());

        return ResponseHelper::response($this->service->status, $this->service->response);
    }


    public function search(UniqueVisitorCounterSearchPost $request)
    {
        $this->service->search($request->rulesInput());

        return ResponseHelper::response($this->service->status, $this->service->response);
    }
    
}
