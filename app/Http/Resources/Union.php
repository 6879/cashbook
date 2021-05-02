<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Union extends JsonResource
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
            'id' => $this->id,
            'upazila_id' => $this->upazila_id,
            'union_name' => $this->union_name,
            'union_bn_name' => $this->union_bn_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
