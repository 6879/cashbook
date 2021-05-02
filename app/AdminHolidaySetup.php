<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminHolidaySetup extends Model
{
    public function adminHolidayTypeRelation(){
       return $this->belongsTo(AdminHolidayType::class,'holidayTypeId','holidayTypeId');
    }
}
