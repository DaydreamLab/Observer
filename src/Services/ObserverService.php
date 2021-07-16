<?php

namespace DaydreamLab\Observer\Services;

use DaydreamLab\JJAJ\Repositories\BaseRepository;
use DaydreamLab\JJAJ\Services\BaseService;

abstract class ObserverService extends BaseService
{
    protected $package = 'Observer';

    public function __construct(BaseRepository $repo)
    {
        parent::__construct($repo);
        $this->repo = $repo;
    }
}
