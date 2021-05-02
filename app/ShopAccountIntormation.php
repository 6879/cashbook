<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopAccountIntormation extends Model
{
    protected $fillable = [
        'id',
        'shopId',
        'billingDate',
        'billAmount',
        'totalMonth',
        'totalPaid',
        'currentDue',
        'topupCurrentBalance',
        'topupTotalBalance'
    ];
}
