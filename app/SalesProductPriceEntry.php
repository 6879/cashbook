<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesProductPriceEntry extends Model
{
    function productName(){
      return $this->belongsTo(ProductName::Class,'productId','productNameId')->select('productNameId','productName','productCode');
    }
}
