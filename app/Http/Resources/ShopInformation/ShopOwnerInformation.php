<?php

namespace App\Http\Resources\ShopInformation;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopOwnerInformation extends JsonResource
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
            'shopCPInfoId' => $this->shopCPInfoId,
            'shopId' => $this->shopId,

            'shopOwnerName' => $this->shopOwnerName,
            'shopOwnerMobileNo' => $this->shopOwnerMobileNo,
            'shopOwnerEmail' => $this->shopOwnerEmail,
            'shopOwnerAddress' => $this->shopOwnerAddress,
            'shopOwnerPhoneNo' => $this->shopOwnerPhoneNo,
            
            'status' => $this->status,
            'deleteStatus' => $this->deleteStatus,
            'createBy' => $this->createBy,
            'updateBy' => $this->updateBy,
            'deleteBy' => $this->deleteBy,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'delete_at' => $this->delete_at,
            ];
    }
}
