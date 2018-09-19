<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\ViewElement;
use App\Http\Classes\Reply;

class HelpController extends Controller
{
    //GET /help
    public function index()
    {
        $fileApi = env("APP_ENV") . "/routes/api.php";

        if(substr(env("APP_ENV"), -1) == "/")
        {
            $fileApi = env("APP_ENV") . "routes/api.php";
        }

        $fileSession = fopen($fileApi , "r");

var_dump($fileSession);

        fclose($fileSession);

        return Reply::make("help", 200);
    }

    //GET /api/help/view
    public function viewName()
    {
        $api = ViewElement::allViewName();

        return Reply::json(200, $api);
    }

    //GET /api/help/view/{viewName}
    public function viewInfo($viewName)
    {
        $allViewName = ViewElement::allViewName();

        if(in_array($viewName, $allViewName))
        {
            $api = ViewElement::getData($viewName);

            return Reply::json(200, $api);
        }
        else
        {
            return Reply::json(404);
        }
    }
}
