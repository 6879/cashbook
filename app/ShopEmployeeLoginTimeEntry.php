<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopEmployeeLoginTimeEntry extends Model
{
    public function ShopEmployeeEntry(){
        return $this->belongsTo(ShopEmployeeEntry::class,'shopEmployeeEntryId','shopEmployeeEntryId');
    }

}
