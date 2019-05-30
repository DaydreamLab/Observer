<?php

namespace DaydreamLab\Observer\Services\Unique\Admin;

use DaydreamLab\JJAJ\Services\BaseService;
use DaydreamLab\Observer\Repositories\Unique\Admin\UniqueVisitorAdminRepository;

class UniqueVisitorAdminService extends BaseService
{
    protected $type = 'UniqueVisitorAdmin';

    public function __construct(UniqueVisitorAdminRepository $repo)
    {
        parent::__construct($repo);
        $this->repo = $repo;
    }
    
}
