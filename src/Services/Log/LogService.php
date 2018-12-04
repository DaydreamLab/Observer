<?php

namespace DaydreamLab\Observer\Services\Log;

use DaydreamLab\Observer\Repositories\Log\LogRepository;
use DaydreamLab\JJAJ\Services\BaseService;

class LogService extends BaseService
{
    protected $type = 'Log';

    public function __construct(LogRepository $repo)
    {
        parent::__construct($repo);
    }
}
