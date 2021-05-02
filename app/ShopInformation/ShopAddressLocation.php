<?php

namespace App\ShopInformation;

use Illuminate\Database\Eloquent\Model;

class ShopAddressLocation extends Model
{
    protected $fillable = [
        'shopALId',
        'shopId',
        'branchId',
        'countryId',
        'divisionId',
        'distrinctId',
        'thanaId',
        'unionId',
        'wardId',
        'addressLine1',
        'addressLine2',
        'front',
        'back',
        'left',
        'right',
        'shopSize',
        'marketName',
        'shopNo',
        'areaKnownName',
        'status',
        'deleteStatus',
        'createBy',
      ];
}
