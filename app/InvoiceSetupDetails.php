<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceSetupDetails extends Model
{
    protected $fillable = [
                            'invoiceSetupId', 
                            'logo',
                            'address',
                            'toText',
                            'titleText',
                            'themeColor',
                            'subTotal',
                            'vat',
                            'discount',
                            'grandTotal',
                            'noticeTitle',
                            'noticeDetails',
                            'generatedFrom',
                            'thankyou',
                            'createBy',
                            'updateBy',
                            'created_at',
                            'updated_at'];
}
