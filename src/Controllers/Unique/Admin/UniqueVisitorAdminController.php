<?php

namespace DaydreamLab\Observer\Controllers\Unique\Admin;

use DaydreamLab\JJAJ\Controllers\BaseController;
use DaydreamLab\JJAJ\Helpers\ResponseHelper;
use Illuminate\Support\Collection;
use DaydreamLab\Observer\Services\Unique\Admin\UniqueVisitorAdminService;

class UniqueVisitorAdminController extends BaseController
{
    public function __construct(UniqueVisitorAdminService $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }


    public function getItem($id)
    {
        $this->service->getItem($id);

        return $this->response($this->service->status, $this->service->response);
    }


    public function getItems()
    {
        $this->service->search(new Collection());

        return $this->response($this->service->status, $this->service->response);
    }


    public function getList()
    {
        $this->service->getList(new Collection());

        return $this->response($this->service->status, $this->service->response);
    }


    public function checkout($id)
    {
        $this->service->checkout($id);

        return $this->response($this->service->status, $this->service->response);
    }


    public function ordering(UniqueVisitorOrderingPost $request)
    {
        $this->service->ordering($request->rulesInput());

        return $this->response($this->service->status, $this->service->response);
    }


    public function remove(UniqueVisitorRemovePost $request)
    {
        $this->service->remove($request->rulesInput());

        return $this->response($this->service->status, $this->service->response);
    }


    public function state(UniqueVisitorStatePost $request)
    {
        $this->service->state($request->rulesInput());

        return $this->response($this->service->status, $this->service->response);
    }


    public function store(UniqueVisitorStorePost $request)
    {
        $this->service->store($request->rulesInput());

        return $this->response($this->service->status, $this->service->response);
    }


    public function search(UniqueVisitorSearchPost $request)
    {
        $this->service->search($request->rulesInput());

        return $this->response($this->service->status, $this->service->response);
    }
}
