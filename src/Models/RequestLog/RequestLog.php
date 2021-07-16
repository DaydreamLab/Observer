<?php

namespace DaydreamLab\Observer\Models\RequestLog;

use DaydreamLab\JJAJ\Traits\RecordChanger;
use DaydreamLab\JJAJ\Traits\UserInfo;
use DaydreamLab\Observer\Models\ObserverModel;

class RequestLog extends ObserverModel
{
    use UserInfo, RecordChanger {
        RecordChanger::boot as traitBoot;
    }
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'request_logs';


    protected $name = 'RequestLog';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uri',
        'method',
        'controllerMethod',
        'middleware',
        'headers',
        'payload',
        'responseCode',
        'response',
        'duration',
        'memory',
        'ip',
        'created_by'
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

    protected $casts = [
        'middleware' => 'array',
        'headers' => 'array',
        'payload' => 'array',
        'response' => 'array',
    ];

    public static function boot()
    {
        self::traitBoot();
    }

}