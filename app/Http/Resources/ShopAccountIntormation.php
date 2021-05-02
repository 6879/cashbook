<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopAccountIntormation extends JsonResource
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
                'billingDate' => $this->billingDate,
                'billAmount' => $this->billAmount,
                'totalMonth' => $this->totalMonth,
                'totalPaid' => $this->totalPaid,
                'currentDue' => $this->currentDue,
                'topupCurrentBalance' => $this->topupCurrentBalance,
                'topupTotalBalance' => $this->topupTotalBalance,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
               ];
    }
}
