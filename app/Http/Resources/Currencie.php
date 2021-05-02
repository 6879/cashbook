<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Currencie extends JsonResource
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
            'country' => $this->country,
            'currency' => $this->currency,
            'code' => $this->code,
            'minor_unit' => $this->minor_unit,
            'symbol' => $this->symbol,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
