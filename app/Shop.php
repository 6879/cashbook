<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Shop extends Authenticatable
{
    use Notifiable;

    protected $guard = 'shop';

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
        'status',
        'deleteStatus'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}