<?php

namespace DaydreamLab\Observer\Resources\Log\Admin\Models;

use Illuminate\Http\Resources\Json\JsonResource;

class LogAdminResource extends JsonResource
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
            'action'        => $this->action,
            'result'        => $this->result,
            'type'          => $this->type,
            'item_id'       => $this->item_id,
            'payload'       => $this->payload,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at
        ];
    }
}
