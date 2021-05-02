<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseProductEntry extends Model
{
    public function productName(){
      return $this->belongsTo(ProductName::class,'productId','productNameId')->select('productNameId','productName','productCode');
    }
    public function brandName(){
      return $this->belongsTo(BrandEntry::class,'brandId','brandId')->select('brandId','brandName');
    }
    public function unitName(){
      return $this->belongsTo(UniteEntry::class,'unitId','uniteEntryId')->select('uniteEntryId','uniteEntryName');
    }
    public function productSupplierName(){
      return $this->belongsTo(AddProductSupplierEntry::class,'productSupplierId','productSupplierId')->select('productSupplierId','productSupplierName');
    }
}
