<?php

namespace DaydreamLab\Observer\Services\Search\Front;

use DaydreamLab\Observer\Repositories\Search\Front\SearchFrontRepository;
use DaydreamLab\Observer\Services\Search\SearchService;

class SearchFrontService extends SearchService
{
    protected $type = 'SearchFront';

    public function __construct(SearchFrontRepository $repo)
    {
        parent::__construct($repo);
        $this->repo = $repo;
    }
}
