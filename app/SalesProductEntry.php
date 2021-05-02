<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesProductEntry extends Model
{
    public function productName(){
      return $this->belongsTo(ProductName::class,'productId','productNameId')->select('productNameId','productName','productCode');
    }
    public function brandName(){
      return $this->belongsTo(BrandEntry::class,'brandId','brandId');
    }
    public function unitName(){
      return $this->belongsTo(UniteEntry::class,'unitId','uniteEntryId');
    }
}
