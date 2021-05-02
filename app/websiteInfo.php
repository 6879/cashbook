<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class websiteInfo extends Model
{
    protected $fillable = ['id','name', 'link','description'];
}
