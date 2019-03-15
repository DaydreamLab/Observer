<?php
namespace DaydreamLab\Observer\Models\Unique;

use DaydreamLab\JJAJ\Models\BaseModel;

class UniqueVisitor extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unique_visitors';


    protected $name = 'UniqueVisitor';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip',
        'ua'
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