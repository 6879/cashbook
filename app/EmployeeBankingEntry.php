<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeBankingEntry extends Model
{
    public function bankTypeEntry(){
        return $this->belongsTo(BankTypeEntry::Class,'bankTypeId','bankTypeEntryId');
    }
    public function bankEntry(){
        return $this->belongsTo(BankEntry::Class,'bankNameId','bankEntryId');
    }
}
