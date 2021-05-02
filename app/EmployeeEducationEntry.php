<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeEducationEntry extends Model
{
    public function nameOfInstitute(){
       return $this->belongsTo(AdminNameOfInstitute::class,'nameOfInstituteId','nameOfInstituteId');
    }
    public function nameOfDegree(){
       return $this->belongsTo(AdminNameOfDegree::class,'nameOfDegreeId','nameOfDegreeId');
    }
    public function grade(){
       return $this->belongsTo(AdminGrade::class,'gradeId','gradeId');
    }
}
