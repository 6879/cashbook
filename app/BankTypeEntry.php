<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankTypeEntry extends Model
{
    public function BankEntry(){
        return $this->hasMany('App\BankEntry');
    }
}
