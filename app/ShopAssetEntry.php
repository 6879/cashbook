<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopAssetEntry extends Model
{
    function assetCategoryName(){
      return $this->belongsTo(ShopAssetCategory::Class,'assetCategoryId','assetCategoryId');
    }
    function assetBrandName(){
      return $this->belongsTo(AssetBrandEntry::Class,'assetBrandId','assetBrandEntryId');
    }
    function assetCodeName(){
      return $this->belongsTo(AssetCodeEntry::Class,'assetProductId','assetCodeEntryId');
    }
    function supplierName(){
      return $this->belongsTo(ShopAddAssetSupplierEntry::Class,'assetSupplierId','assetSupplierId');
    }
}
