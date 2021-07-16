<?php

namespace DaydreamLab\Observer\Resources\RequestLog\Admin\Models;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestLogAdminListResource extends JsonResource
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
            'id'            => $this->id,
            'uri'           => $this->uri,
            'modelName'     => $this->modelName,
            'apiMethod'     => $this->apiMethod,
            'responseCode'  => $this->responseCode,
            'duration'      => $this->duration,
            'memory'        => $this->memory,
            'creatorName'   => $this->creatorName
        ];
    }
}
