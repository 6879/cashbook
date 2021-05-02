<?php

namespace App\ShopInformation;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ShopInformation extends Authenticatable
{


    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'shopInfoId',
        'name',
        'shopName',
        'shopSirialId',
        'shopUserName',
        'password',
        'pass',
        'lastLoginIp',
        'refferTypeId',
        'refferUserId',
        'shopTypeId',
        'shopLicenceTypeId',
        'website',
        'facebook',
        'youtube',
        'haveBranch',
        'totalBranch',
        'paymentStatus',
        'status',
        'deleteStatus'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
