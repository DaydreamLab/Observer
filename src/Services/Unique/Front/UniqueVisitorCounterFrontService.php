<?php

namespace DaydreamLab\Observer\Services\Unique\Front;

use DaydreamLab\JJAJ\Helpers\Helper;
use DaydreamLab\Observer\Services\Unique\UniqueVisitorCounterService;
use DaydreamLab\Observer\Repositories\Unique\Front\UniqueVisitorCounterFrontRepository;
use Illuminate\Support\Str;

class UniqueVisitorCounterFrontService extends UniqueVisitorCounterService
{
    protected $type = 'UniqueVisitorCounterFront';

    public function __construct(UniqueVisitorCounterFrontRepository $repo)
    {
        parent::__construct($repo);
        $this->repo = $repo;
    }

    public function getVisitorCounter(){
        //123444
        $counter_data = $this->repo->getVisitorCounter();
        if( gettype($counter_data) == 'object' ){
            $this->status   = Str::upper(Str::snake($this->type.'GetItemSuccess'));
            $this->response = ['counter' => $counter_data->sum];
        }else{
            $this->status   = Str::upper(Str::snake($this->type.'GetItemFail'));
            $this->response = [];
        }

    }
    
}
