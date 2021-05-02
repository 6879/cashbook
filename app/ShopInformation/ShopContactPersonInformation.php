<?php

namespace App\ShopInformation;

use Illuminate\Database\Eloquent\Model;

class ShopContactPersonInformation extends Model
{
      protected $fillable = [
                              'shopCPInfoId',
                              'shopId',
                              'CPName',
                              'CPMobileNo',
                              'CPEmail',
                              'CPAddress',
                              'CPPhoneNo',
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
