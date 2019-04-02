<?php

namespace DaydreamLab\Observer\Services\Unique\Admin;

use DaydreamLab\Observer\Services\Unique\UniqueVisitorCounterService;
use DaydreamLab\Observer\Repositories\Unique\Admin\UniqueVisitorCounterAdminRepository;

class UniqueVisitorCounterAdminService extends UniqueVisitorCounterService
{
    protected $type = 'UniqueVisitorCounterAdmin';

    public function __construct(UniqueVisitorCounterAdminRepository $repo)
    {
        parent::__construct($repo);
        $this->repo = $repo;
    }
}
