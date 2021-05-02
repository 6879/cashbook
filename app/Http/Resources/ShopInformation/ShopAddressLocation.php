<?php

namespace App\Http\Resources\ShopInformation;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopAddressLocation extends JsonResource
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
            'shopALId' => $this->shopALId,
            'shopId' => $this->shopId,
            'branchId' => $this->branchId,
            'countryId' => $this->countryId,
            'divisionId' => $this->divisionId,
            'distrinctId' => $this->distrinctId,
            'thanaId' => $this->thanaId,
            'unionId' => $this->unionId,
            'wardId' => $this->wardId,
            'addressLine1' => $this->addressLine1,
            'addressLine2' => $this->addressLine2,
            'front' => $this->front,
            'back' => $this->back,
            'left' => $this->left,
            'right' => $this->right,
            'shopSize' => $this->shopSize,
            'marketName' => $this->marketName,
            'shopNo' => $this->shopNo,
            'areaKnownName' => $this->areaKnownName,
            
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
