<?php

namespace DaydreamLab\Observer\Repositories\Search\Front;

use DaydreamLab\Observer\Repositories\Search\SearchRepository;
use DaydreamLab\Observer\Models\Search\Front\SearchFront;

class SearchFrontRepository extends SearchRepository
{
    public function __construct(SearchFront $model)
    {
        parent::__construct($model);
        $this->model = $model;
}