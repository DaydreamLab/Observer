<?php
namespace DaydreamLab\Observer\Models\Log;

use DaydreamLab\JJAJ\Models\BaseModel;
use DaydreamLab\User\Models\User\User;

class Log extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'logs';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'action',
        'type',
        'result',
        'item_id',
        'payload',
        'created_by',
        'updated_by'
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
        'creator'
    ];

    protected $casts = [
        'payload'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function getCreatorAttribute()
    {
        $creator = $this->creator()->first();

        return $creator ? $creator->nickname : null;
    }

}