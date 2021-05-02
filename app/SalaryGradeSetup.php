<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryGradeSetup extends Model
{
    public function ShopEmployeeList(){
      return $this->belongsTo(ShopEmployeeEntry::class,'employeEntryId','shopEmployeeEntryId');
    }
    public function GradeList(){
      return $this->belongsTo(GradeEntry::class,'gradeEntryId','gradeEntryId');
    }
}
