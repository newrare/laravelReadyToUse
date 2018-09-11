<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    //table name
    protected $table = "api";

    //for hidden column
    protected $hidden = array();

    //for not use laravel column updated_at created_at
    public $timestamps = false;
}
