<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminSubMenu extends Model
{
    public function adminMenuRelation(){
       return $this->belongsTo(AdminMenu::class,'adminMenuId','adminMenuId');
    }
    public function adminMenuPermission(){
       return $this->hasMany(AdminMenuPermission::class,'subMenuId');
    }

}
