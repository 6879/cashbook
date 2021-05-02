<?php

namespace App\ShopInformation\BranchInformation;

use Illuminate\Database\Eloquent\Model;

class BranchInformation extends Model
{
    protected $fillable = [
        'branchName',
        'branchCode',
        'branchMobileNo',
        'branchRepresentativeName',
        'branchRepresentativeMobileNo',
        'branchAddress',
        'paymentStatus',
        'status',
        'deleteStatus',
        'createBy',
        'updateBy',
        'deleteBy',
        'delete_at',
         ];
}
