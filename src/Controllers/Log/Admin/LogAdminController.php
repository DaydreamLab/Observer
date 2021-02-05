<?php

namespace DaydreamLab\Observer\Controllers\Log\Admin;

use DaydreamLab\JJAJ\Controllers\BaseController;
use DaydreamLab\JJAJ\Helpers\ResponseHelper;
use Illuminate\Support\Collection;
use DaydreamLab\Observer\Services\Log\LogService;
use DaydreamLab\Observer\Requests\Log\LogSearchPost;
use DaydreamLab\Observer\Resources\Log\Admin\Collections\LogAdminListResourceCollection;

class LogAdminController extends BaseController
{

    public function __construct(LogService $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }


    public function search(LogSearchPost $request)
    {
        $this->service->setUser($request->user('api'));
        $this->service->search($request->validated());

        return $this->response($this->service->status, new LogAdminListResourceCollection($this->service->response));
    }

}
