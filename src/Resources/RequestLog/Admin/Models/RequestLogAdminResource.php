<?php

namespace DaydreamLab\Observer\Resources\RequestLog\Admin\Models;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestLogAdminResource extends JsonResource
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
            'method'        => $this->method,
            'modelName'     => $this->modelName,
            'apiMethod'     => $this->apiMethod,
            'middleware'    => $this->middleware,
            'header'        => $this->header,
            'payload'       => $this->payload,
            'responseCode'  => $this->responseCode,
            'response'      => $this->response,
            'duration'      => $this->duration,
            'memory'        => $this->memory,
            'creatorName'   => $this->creatorName,
            'createdAt'     => $this->created_at,
        ];
    }
}
