<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //table name
    protected $table = "user";

    //for hidden column
    protected $hidden = array("password");

    //for not use laravel column updated_at created_at
    public $timestamps = false;
}
