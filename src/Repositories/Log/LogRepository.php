<?php

namespace DaydreamLab\Observer\Repositories\Log;

use DaydreamLab\JJAJ\Repositories\BaseRepository;
use DaydreamLab\Observer\Models\Log\Log;

class LogRepository extends BaseRepository
{
    public function __construct(Log $model)
    {
        parent::__construct($model);
    }
}