<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesProductDiscountPriceEntry extends Model
{
    function productName(){
      return $this->belongsTo(ProductName::Class,'productId','productNameId')->select('productNameId','productName','productCode');
    }
}
