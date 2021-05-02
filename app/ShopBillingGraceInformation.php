<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopBillingGraceInformation extends Model
{
    protected $fillable = [
        'shopId',
        'date',
        'message',
        'create_by'
    ];
}
