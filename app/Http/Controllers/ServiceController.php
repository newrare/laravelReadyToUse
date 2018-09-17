<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\ViewElement;
use App\Http\Classes\Reply;

use Session;

class ServiceController extends Controller
{
    //GET /service
    public function index()
    {
        return Reply::make("service", 200);
    }
}
