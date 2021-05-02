<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceSetup extends Model
{
    protected $fillable = ['shopId', 'invoiceForId', 'invoiceTypeId', 'invoiceFormetId', 'status', 'createBy', 'updateBy'];
}
