<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopAddBankEntry extends Model
{
   public function BankTypeEntry(){
       return $this->belongsTo(BankTypeEntry::class,'bankTypeEntryId','bankTypeEntryId');
   }
   public function BankEntry(){
       return $this->belongsTo(BankEntry::class,'bankEntryId','bankEntryId');
   }
}
