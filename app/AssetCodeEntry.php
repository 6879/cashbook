<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetCodeEntry extends Model
{
    function assetCategoryName(){
       return $this->belongsTo(ShopAssetCategory::Class,'assetCategoryId','assetCategoryId');
    }
}
