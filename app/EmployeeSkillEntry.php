<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSkillEntry extends Model
{
    public function skillGrade(){
      return $this->belongsTo(AdminSkillGrade::class,'skillGradeId','skillGradeId');
    }
}
