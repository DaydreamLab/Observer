<?php

namespace DaydreamLab\Observer\Services\Search\Admin;

use DaydreamLab\Observer\Repositories\Search\Admin\SearchAdminRepository;
use DaydreamLab\Observer\Services\Search\SearchService;

class SearchAdminService extends SearchService
{
    protected $type = 'SearchAdmin';

    public function __construct(SearchAdminRepository $repo)
    {
        parent::__construct($repo);
        $this->repo = $repo;
    }
}
