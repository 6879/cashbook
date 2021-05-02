<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminHolidayType extends Model
{
  public function adminHolidaySetupRelation(){
     return $this->hasMany(AdminHolidaySetup::class);
  }
}
