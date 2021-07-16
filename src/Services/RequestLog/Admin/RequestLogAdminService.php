<?php

namespace DaydreamLab\Observer\Services\RequestLog\Admin;

use DaydreamLab\JJAJ\Traits\LoggedIn;
use DaydreamLab\Observer\Repositories\RequestLog\Admin\RequestLogAdminRepository;
use DaydreamLab\Observer\Services\RequestLog\RequestLogService;

class RequestLogAdminService extends RequestLogService
{
    use LoggedIn;

    public function __construct(RequestLogAdminRepository $repo)
    {
        parent::__construct($repo);
        $this->repo = $repo;
    }
}
