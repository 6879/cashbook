<?php

namespace App\Http\Resources\ShopInformation;

use Illuminate\Http\Resources\Json\JsonResource;

class Admin extends JsonResource
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
            'role' => $this->role,
            'shopName' => $this->shopName,
            'shopSirialId' => $this->shopSirialId,
            'email' => $this->email,
            'password' => $this->password,
            'pass' => $this->pass,
            'lastLoginIp' => $this->lastLoginIp,
            'refferTypeId' => $this->refferTypeId,
            'refferUserId' => $this->refferUserId,
            'shopTypeId' => $this->shopTypeId,
            'shopLicenceTypeId' => $this->shopLicenceTypeId,
            'website' => $this->website,
            'facebook' => $this->facebook,
            'youtube' => $this->youtube,
            'haveBranch' => $this->haveBranch,
            'totalBranch' => $this->totalBranch,
            'currencyId' => $this->currencyId,
            'paymentStatus' => $this->paymentStatus,
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
