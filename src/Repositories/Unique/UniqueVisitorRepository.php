<?php

namespace DaydreamLab\Observer\Repositories\Unique;

use Carbon\Carbon;
use DaydreamLab\JJAJ\Helpers\Helper;
use DaydreamLab\JJAJ\Repositories\BaseRepository;
use DaydreamLab\Observer\Models\Unique\UniqueVisitor;
use Illuminate\Support\Collection;

class UniqueVisitorRepository extends BaseRepository
{
    public function __construct(UniqueVisitor $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function alreadyVisited(Collection $input)
    {
        return $this->model
            ->where('ip', $input->ip)
            ->where('ua', $input->ua)
            ->whereBetween('created_at', [Carbon::today(), Carbon::tomorrow()])
            ->get()
            ->count();

    }
}