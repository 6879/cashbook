<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Shop extends Authenticatable
{
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shopInfoId',

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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
   }