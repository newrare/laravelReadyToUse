<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\ViewElement;
use App\Http\Classes\Reply;

class ViewController extends Controller
{
    //GET /view
    public function index()
    {
        $result = ViewElement::allViewName();

        return Reply::make("view", 200, $result);
    }

    //GET /view/<idView>
    public function show($viewName)
    {
        $allViewName = ViewElement::allViewName();

        if(in_array($viewName, $allViewName))
        {
            $result = ViewElement::getData($viewName);

            return Reply::make("view", 200, $result);
        }
        else
        {
            return Reply::make("view", 404);
        }
    }
}
