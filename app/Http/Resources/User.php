<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email_verified_at' => $this->email_verified_at,
            'adminId' => $this->adminId,
            'shopId' => $this->shopId,
            'employeeId' => $this->employeeId,
            'adminAccessId' => $this->adminAccessId,
            'shopAccessName' => $this->shopAccessName,
            'password' => $this->password,
            'address' => $this->address,
            'createBy' => $this->createBy,
            'updateBy' => $this->updateBy,
            'role' => $this->role,
            'remember_token' => $this->remember_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}
