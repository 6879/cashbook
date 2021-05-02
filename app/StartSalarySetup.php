<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StartSalarySetup extends Model
{
    public function shopEmployeeName(){
       return $this->belongsTo(ShopEmployeeEntry::class,'employeEntryId','shopEmployeeEntryId');
    }
    public function gradeEntryList(){
       return $this->belongsTo(GradeEntry::class,'gradeEntryId','gradeEntryId');
    }
    public function JobDepartments(){
       return $this->belongsTo(JobDepartmentEntry::class,'jobDepartmentId','jobDepartmentEntryId');
    }
}
