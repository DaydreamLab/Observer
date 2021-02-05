<?php

namespace DaydreamLab\Observer\Controllers\Search;

use DaydreamLab\JJAJ\Controllers\BaseController;
use DaydreamLab\JJAJ\Helpers\ResponseHelper;
use Illuminate\Support\Collection;
use DaydreamLab\Observer\Services\Search\SearchService;


class SearchController extends BaseController
{
    public function __construct(SearchService $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }

}
