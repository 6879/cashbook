<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopEmployeeEntry extends Model
{
    public function shopEmployeeTypes(){
       return $this->belongsTo(ShopEmployeeType::class,'employeeTypeId','shopEmployeeTypeId');
    }
    public function JobDepartments(){
       return $this->belongsTo(JobDepartmentEntry::class,'jobDepartmentId','jobDepartmentEntryId');
    }
  
}
