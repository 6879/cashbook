<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveEntry extends Model
{
    public function employeeName(){
       return $this->belongsTo(ShopEmployeeEntry::class,'employeEntryId','shopEmployeeEntryId')->select('shopEmployeeEntryId','fullName');
    }
}
