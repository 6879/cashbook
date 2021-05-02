<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QrCodeSetup extends Model
{
    protected $fillable = ['invoiceShowStatus', 'scanInformation','createBy','updateBy'];
}
