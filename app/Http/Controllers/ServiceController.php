<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\ViewElement;
use App\Http\Classes\Reply;

class ServiceController extends Controller
{
    //GET /view
    public function index()
    {
        return Reply::make("service", 200);
    }
}
