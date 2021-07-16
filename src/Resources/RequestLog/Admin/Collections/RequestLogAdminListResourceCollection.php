<?php

namespace DaydreamLab\Observer\Resources\RequestLog\Admin\Collections;

use DaydreamLab\JJAJ\Resources\BaseResourceCollection;
use DaydreamLab\Observer\Resources\RequestLog\Admin\Models\RequestLogAdminListResource;

class RequestLogAdminListResourceCollection extends BaseResourceCollection
{
    public $collects = RequestLogAdminListResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
