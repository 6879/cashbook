<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceSetupDetails extends JsonResource
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
            'invoiceSetupId' => $this->invoiceSetupId,
            'logo' => $this->logo,
            'address' => $this->address,
            'toText' => $this->toText,
            'titleText' => $this->titleText,
            'themeColor' => $this->themeColor,
            'subTotal' => $this->subTotal,
            'vat' => $this->vat,
            'discount' => $this->discount,
            'grandTotal' => $this->grandTotal,
            'noticeTitle' => $this->noticeTitle,
            'noticeDetails' => $this->noticeDetails,
            'thankyou' => $this->thankyou,
            'generatedFrom' => $this->generatedFrom,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];



    }
}
