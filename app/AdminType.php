<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminType extends Model
{
   public function adminSetups(){
      return $this->hasMany(AdminSetup::class,'adminTypeId');
   }
   public function adminMenuPermission(){
      return $this->hasMany(AdminMenuPermission::class,'adminType');
   }
}
