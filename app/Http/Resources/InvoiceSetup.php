<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceSetup extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'shopId' => $this->shopId,
            'invoiceForId' => $this->invoiceForId,
            'invoiceTypeId' => $this->invoiceTypeId,
            'invoiceFormetId' => $this->invoiceFormetId,
            'status' => $this->status,
            'createBy' => $this->createBy,
            'updateBy' => $this->updateBy,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
