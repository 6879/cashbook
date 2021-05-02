<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseProductDetails extends Model
{
     function purchaseProductInfo(){
        return $this->belongsto(PurchaseProductEntry::Class,'purchaseProductId','purchaseProductId');
     }
     function productName(){
        return $this->belongsto(ProductName::Class,'productId','productNameId');
     }
}
