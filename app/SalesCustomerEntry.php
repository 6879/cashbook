<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesCustomerEntry extends Model
{
     function shopCustomerTypeName()
     {
          return $this->belongsTo(ShopCustomerTypeEntry::Class,'customerTypeId','shopCustomerTypeEntryId')->select('shopCustomerTypeEntryId','shopCustomerName');
     }
}
