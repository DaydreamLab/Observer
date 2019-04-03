<?php
namespace DaydreamLab\Observer\Models\Unique\Admin;

use DaydreamLab\Observer\Models\Unique\UniqueVisitorCounter;

class UniqueVisitorCounterAdmin extends UniqueVisitorCounter
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unique_visitors_counters';


}