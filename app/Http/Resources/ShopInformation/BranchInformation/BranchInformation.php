<?php

namespace App\Http\Resources\ShopInformation\BranchInformation;

use Illuminate\Http\Resources\Json\JsonResource;

class BranchInformation extends JsonResource
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
            'shopId' => $this->shopId,
            'branchName' => $this->branchName,
            'branchCode' => $this->branchCode,
            'branchMobileNo' => $this->branchMobileNo,
            'branchRepresentativeName' => $this->branchRepresentativeName,
            'branchRepresentativeMobileNo' => $this->branchRepresentativeMobileNo,
            'branchAddress' => $this->branchAddress,
        
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
