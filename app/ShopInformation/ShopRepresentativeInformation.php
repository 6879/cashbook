<?php

namespace App\ShopInformation;

use Illuminate\Database\Eloquent\Model;

class ShopRepresentativeInformation extends Model
{
    protected $fillable = [
        'shopRepInfoId',
        'shopId',
        'SRName',
        'SRMobileNo',
        'SREmail',
        'SRAddress',
        'SRPhoneNo',
        'status',
        'deleteStatus',
        'createBy',
        'updateBy',
        'deleteBy',
        'created_at',
        'updated_at',
        'delete_at'
      ];
}
