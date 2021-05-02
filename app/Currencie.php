<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currencie extends Model
{
    protected $fillable = [
        'id',
        'country',
        'currency',
        'code',
        'minor_unit',
        'symbol'];
}
