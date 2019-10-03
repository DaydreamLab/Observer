<?php

namespace DaydreamLab\Observer\Controllers\Search\Admin;

use DaydreamLab\JJAJ\Controllers\BaseController;
use DaydreamLab\JJAJ\Helpers\ResponseHelper;
use DaydreamLab\Observer\Requests\Search\Admin\SearchAdminKeywordListPost;
use Illuminate\Support\Collection;
use DaydreamLab\Observer\Services\Search\Admin\SearchAdminService;
use DaydreamLab\Observer\Requests\Search\Admin\SearchAdminRemovePost;
use DaydreamLab\Observer\Requests\Search\Admin\SearchAdminStorePost;
use DaydreamLab\Observer\Requests\Search\Admin\SearchAdminStatePost;
use DaydreamLab\Observer\Requests\Search\Admin\SearchAdminSearchPost;
use DaydreamLab\Observer\Requests\Search\Admin\SearchAdminOrderingPost;

class SearchAdminController extends BaseController
{
    public function __construct(SearchAdminService $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }


    public function keywordList(SearchAdminKeywordListPost $request)
    {
        $this->service->canAction('searchKetwordList');
        $this->service->keywordList($request->rulesInput());
        
        return ResponseHelper::response($this->service->status, $this->service->response);
    }
}
