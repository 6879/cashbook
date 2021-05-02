<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminSetup extends Model
{
    public function adminTypeRelation(){
       return $this->belongsTo(AdminType::class,'adminTypeId','adminTypeId');
    }
    public function adminEntryRelation(){
       return $this->belongsTo(AdminEntry::class,'adminId','adminId');
    }
}
