<?php

namespace DaydreamLab\Observer\Controllers\Log;

use DaydreamLab\JJAJ\Controllers\BaseController;
use DaydreamLab\JJAJ\Helpers\ResponseHelper;
use Illuminate\Support\Collection;
use DaydreamLab\Observer\Services\Log\LogService;
use DaydreamLab\Observer\Requests\Log\LogOrderingPost;
use DaydreamLab\Observer\Requests\Log\LogRemovePost;
use DaydreamLab\Observer\Requests\Log\LogStorePost;
use DaydreamLab\Observer\Requests\Log\LogStatePost;
use DaydreamLab\Observer\Requests\Log\LogSearchPost;

class LogController extends BaseController
{
    public function __construct(LogService $service)
    {
        parent::__construct($service);
    }


    public function getItem($id)
    {
        $this->service->getItem($id);

        return ResponseHelper::response($this->service->status, $this->service->response);
    }

    public function search(LogSearchPost $request)
    {
        $this->service->canAction('searchLog');
        $this->service->search($request->rulesInput());

        return ResponseHelper::response($this->service->status, $this->service->response);
    }

}
