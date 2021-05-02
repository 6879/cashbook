<?php

namespace App\Http\Resources\ShopInformation;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopRepresentativeInformation extends JsonResource
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
            
            'SRName' => $this->SRName, 
            'SRMobileNo' => $this->SRMobileNo, 
            'SREmail' => $this->SREmail, 
            'SRAddress' => $this->SRAddress, 
            'SRPhoneNo' => $this->SRPhoneNo, 
            
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
