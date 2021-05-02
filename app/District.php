<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
    'id',
    'division_id',
    'district_name',
    'district_bn_name',
    'lat',
    'lon',
    'website'];
}
