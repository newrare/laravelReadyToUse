<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\ViewElement;
use App\Http\Classes\Reply;

use Session;

class ServiceController extends Controller
{
    //GET /view
    public function index()
    {
        //test if user is connected
        if(!Session::has("idUser"))
        {
            return Reply::make("account", 401);
        }

        return Reply::make("service", 200);
    }
}
