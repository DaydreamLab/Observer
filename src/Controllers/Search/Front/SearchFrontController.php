<?php

namespace DaydreamLab\Observer\Controllers\Search\Front;

use DaydreamLab\JJAJ\Controllers\BaseController;
use DaydreamLab\JJAJ\Helpers\Helper;
use DaydreamLab\JJAJ\Helpers\ResponseHelper;
use Illuminate\Support\Collection;
use DaydreamLab\Observer\Services\Search\Front\SearchFrontService;
use DaydreamLab\Observer\Requests\Search\Front\SearchFrontRemovePost;
use DaydreamLab\Observer\Requests\Search\Front\SearchFrontStorePost;
use DaydreamLab\Observer\Requests\Search\Front\SearchFrontStatePost;
use DaydreamLab\Observer\Requests\Search\Front\SearchFrontSearchPost;
use DaydreamLab\Observer\Requests\Search\Front\SearchFrontOrderingPost;


class SearchFrontController extends BaseController
{
    public function __construct(SearchFrontService $service)
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


    public function ordering(SearchFrontOrderingPost $request)
    {
        $this->service->ordering($request->rulesInput());

        return ResponseHelper::response($this->service->status, $this->service->response);
    }


    public function remove(SearchFrontRemovePost $request)
    {
        $this->service->remove($request->rulesInput());

        return ResponseHelper::response($this->service->status, $this->service->response);
    }


    public function state(SearchFrontStatePost $request)
    {
        $this->service->state($request->rulesInput());

        return ResponseHelper::response($this->service->status, $this->service->response);
    }


    public function store(SearchFrontStorePost $request)
    {
        $this->service->store($request->rulesInput());

        return ResponseHelper::response($this->service->status, $this->service->response);
    }


    public function search(SearchFrontSearchPost $request)
    {
        $this->service->search($request->rulesInput());

        return ResponseHelper::response($this->service->status, $this->service->response);
    }

    public function aaa()
    {
        Helper::show(1234);
    }
}
