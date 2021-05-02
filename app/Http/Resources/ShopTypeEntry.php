<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopTypeEntry extends JsonResource
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
            'shopTypeEntryId' => $this->shopTypeEntryId,
            'shopTypeName' => $this->shopTypeName,
            'shopTypeCode' => $this->shopTypeCode,
            'shopTypeStatus' => $this->shopTypeStatus,
            'createBy' => $this->createBy,
            'updateBy' => $this->updateBy,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
