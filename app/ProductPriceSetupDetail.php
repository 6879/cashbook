<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPriceSetupDetail extends Model
{
    public function categoryName(){
      return $this->belongsTo(Category::Class, 'categoryId','categoryId');
    }
    public function productName(){
      return $this->belongsTo(ProductName::class,'productNameId','productNameId');
    }
    public function productBrandName(){
      return $this->belongsTo(ProductBrandEntry::class,'productBrandId','productBrandEntryId');
    }
}
