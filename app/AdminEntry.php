<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminEntry extends Model
{
   public function adminSetups(){
      return $this->hasMany(AdminSetup::class,'adminId');
   }

   public function adminMenuPermission(){
      return $this->hasMany(AdminMenuPermission::class,'adminType');
   }

}
