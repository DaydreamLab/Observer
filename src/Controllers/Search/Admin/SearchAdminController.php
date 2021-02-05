<?php

namespace DaydreamLab\Observer\Controllers\Search\Admin;

use DaydreamLab\JJAJ\Controllers\BaseController;
use DaydreamLab\Observer\Requests\Search\Admin\SearchAdminKeywordListPost;


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
        $this->service->keywordList($request->validated());
        
        return $this->response($this->service->status, $this->service->response);
    }
}
