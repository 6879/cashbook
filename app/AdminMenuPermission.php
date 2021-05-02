<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminMenuPermission extends Model
{
      public function adminTypeName(){
         return $this->belongsTo(AdminType::class,'adminType','adminTypeId');
      }
      public function adminEntryName(){
         return $this->belongsTo(AdminEntry::class,'adminId','adminId');
      }
      public function adminMenuName(){
         return $this->belongsTo(AdminMenu::class,'menuId','adminMenuId');
      }
      public function adminSubName(){
         return $this->belongsTo(AdminSubMenu::class,'subMenuId','adminSubMenuId');
      }
}
