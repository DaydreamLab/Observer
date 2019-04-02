<?php

namespace DaydreamLab\Observer\Services\Unique\Front;

use DaydreamLab\Observer\Services\Unique\UniqueVisitorService;
use DaydreamLab\Observer\Repositories\Unique\Front\UniqueVisitorFrontRepository;

class UniqueVisitorFrontService extends UniqueVisitorService
{
    protected $type = 'UniqueVisitorFront';

    public function __construct(UniqueVisitorFrontRepository $repo)
    {
        parent::__construct($repo);
        $this->repo = $repo;
    }
    
}
