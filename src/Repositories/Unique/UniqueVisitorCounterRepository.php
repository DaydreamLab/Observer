<?php

namespace DaydreamLab\Observer\Repositories\Unique;

use Carbon\Carbon;
use DaydreamLab\JJAJ\Repositories\BaseRepository;
use DaydreamLab\Observer\Models\Unique\UniqueVisitorCounter;

class UniqueVisitorCounterRepository extends BaseRepository
{
    public function __construct(UniqueVisitorCounter $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function updateCounter()
    {
        $today = $this->model->whereBetween('created_at', [Carbon::today(), Carbon::tomorrow()])->first();
        if ($today)
        {
            $today->daily++;
            $today->sum++;
            return $this->update($today, $today);
        }
        else
        {
            $last_day = $this->model->orderBy('id', 'desc')->limit(1)->first();
            if ($last_day)
            {
                return $this->create([
                    'daily' => 1,
                    'sum'   => $last_day->sum + 1
                ]);
            }
            else
            {
                return $this->create([
                   'daily'  => 1,
                   'sum'    => 1,
                ]);
            }
        }
    }
}