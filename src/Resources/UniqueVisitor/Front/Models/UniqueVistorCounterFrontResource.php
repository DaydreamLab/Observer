<?php

namespace DaydreamLab\Observer\Resources\UniqueVisitor\Front\Models;

use Illuminate\Http\Resources\Json\JsonResource;

class UniqueVistorCounterFrontResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'counter' => $this->sum
        ];
    }
}
