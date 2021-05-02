<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopPaymentStatus extends Model
{
    protected $fillable = ['id ','paymentStatusName','status'];
}
