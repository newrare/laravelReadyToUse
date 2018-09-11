<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
#use App\Http\Classes\Record;
use App\Http\Classes\Reply;
#use App\Http\Models\User;

#use Input;
#use Validator;

class TokenController extends Controller
{
    //GET /token
    public function index()
    {
        return Reply::make("token", 200);
    }
}
