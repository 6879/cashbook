<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function shopTypeName(){
      return $this->belongsTo(ShopTypeEntry::class,'shopTypeId','shopTypeEntryId');
    }
}
