<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicInfo extends Model
{
    protected $fillable = ['fullName', 'email', 'phone', 'religious', 'image'];
}
