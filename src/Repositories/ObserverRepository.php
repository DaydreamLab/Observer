<?php

namespace DaydreamLab\Observer\Repositories;

use DaydreamLab\JJAJ\Models\BaseModel;
use DaydreamLab\JJAJ\Repositories\BaseRepository;

abstract class ObserverRepository extends BaseRepository
{
    protected $package = 'Observer';

    public function __construct(BaseModel $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}