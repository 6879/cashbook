<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    protected $fillable = ['id','district_id','upazila_name','upazila_bn_name'];
}