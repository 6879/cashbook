<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopBillingAmount extends Model
{
    protected $fillable = [
        'id',
        'billType',
        'billAmount',
        'created_at',
        'updated_at'
      ];
}
