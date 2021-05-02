<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopLoanEntry extends Model
{
     public function ShopLoanProviderEntry(){
         return $this->belongsTo(ShopLoanProviderEntry::class,'loanProviderId','loanProviderId');
     }
}
