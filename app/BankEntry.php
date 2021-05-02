<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankEntry extends Model
{
    public function BankTypeEntry(){
        return $this->belongsTo('App\BankTypeEntry','bankTypeEntryId','bankTypeEntryId');
    }
}
