<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseProductTotalPrice extends Model
{
    public function productName(){
      return $this->belongsTo(ProductName::class,'productId','productNameId');
    }
}
