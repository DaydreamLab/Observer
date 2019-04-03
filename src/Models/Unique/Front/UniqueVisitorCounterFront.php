<?php
namespace DaydreamLab\Observer\Models\Unique\Front;

use DaydreamLab\Observer\Models\Unique\UniqueVisitorCounter;

class UniqueVisitorCounterFront extends UniqueVisitorCounter
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unique_visitors_counters';


}