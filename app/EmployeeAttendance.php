<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    public function employeeName(){
       return $this->belongsTo(ShopEmployeeEntry::class,'employeEntryId','shopEmployeeEntryId')->select('shopEmployeeEntryId','fullName');
    }
}
