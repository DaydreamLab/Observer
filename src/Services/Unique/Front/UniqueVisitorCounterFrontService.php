<?php

namespace DaydreamLab\Observer\Services\Unique\Front;

use DaydreamLab\Observer\Services\Unique\UniqueVisitorCounterService;
use DaydreamLab\Observer\Repositories\Unique\Front\UniqueVisitorCounterFrontRepository;

class UniqueVisitorCounterFrontService extends UniqueVisitorCounterService
{
    protected $type = 'UniqueVisitorCounterFront';

    public function __construct(UniqueVisitorCounterFrontRepository $repo)
    {
        parent::__construct($repo);
        $this->repo = $repo;
    }
    
}
