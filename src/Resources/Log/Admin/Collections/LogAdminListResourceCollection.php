<?php

namespace DaydreamLab\Observer\Resources\Log\Admin\Collections;

use DaydreamLab\Observer\Resources\Log\Admin\Models\LogAdminListResource;
use DaydreamLab\JJAJ\Resources\BaseResourceCollection;

class LogAdminListResourceCollection extends BaseResourceCollection
{
    public $collects = LogAdminListResource::class;

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
