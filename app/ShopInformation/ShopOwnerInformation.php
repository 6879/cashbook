<?php

namespace App\ShopInformation;

use Illuminate\Database\Eloquent\Model;

class ShopOwnerInformation extends Model
{
    protected $fillable = [
                        'shopOwnerInfoId',
                        'shopId',
                        'shopOwnerName',
                        'shopOwnerMobileNo',
                        'shopOwnerEmail',
                        'shopOwnerAddress',
                        'shopOwnerPhoneNo',
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
