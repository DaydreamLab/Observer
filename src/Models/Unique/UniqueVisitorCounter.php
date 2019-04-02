<?php
namespace DaydreamLab\Observer\Models\Unique;

use DaydreamLab\JJAJ\Models\BaseModel;

class UniqueVisitorCounter extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unique_visitors_counters';


    protected $name = 'UniqueVisitorCounter';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'daily',
        'sum',
    ];


    /**
     * The attributes that should be hidden for arrays
     *
     * @var array
     */
    protected $hidden = [
    ];


    /**
     * The attributes that should be append for arrays
     *
     * @var array
     */
    protected $appends = [
    ];


}