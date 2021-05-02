<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
   public function adminSubMenus(){
     return $this->hasMany(AdminSubMenu::class,'adminMenuId');
   }
   public function adminMenuTitleName(){
     return $this->belongsTo(AdminMenuTitleName::class,'adminMenuTitleId','adminMenuTitleId');
   }
   public function adminMenuPermission(){
     return $this->hasMany(AdminMenuPermission::class,'menuId');
   }
}
