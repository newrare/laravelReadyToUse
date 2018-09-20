<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\ViewElement;
use App\Http\Classes\Reply;
use App\Http\Models\User;

use Session;

class HelpController extends Controller
{
    //GET /help
    public function index()
    {
        $arrayApi = array();

       	//get admin
        $isAdmin = 0;

        if(Session::has("idUser"))
        {
            $User = User::find(Session::get("idUser"));

            $isAdmin = $User->isAdmin;
        }

        //read api file
        $fileApi = env("APP_ENV") . "/routes/api.php";

        if(substr(env("APP_ENV"), -1) == "/")
        {
            $fileApi = env("APP_ENV") . "routes/api.php";
        }

        $handle = fopen($fileApi, "r");

        //explore file
        if($handle)
        {
            while(($line = fgets($handle)) !== false)
            {
                //get only api route
                if(preg_match("/^    Route/", $line))
                {
                    $table = array();

                    //check admin
                    if( (preg_match("/checkAdmin/", $line)) and ($isAdmin == 0) )
                    {
						continue;
                    }

                    //get method
                    $explode = explode("::", $line);

                    $explode = explode("(", $explode[1]);

                    $table["method"] = strtoupper(trim($explode[0]));

                    //get uri
                    $explode = explode(",", $explode[1]);

                    $table["uri"] = "/api" . str_replace('"', "", $explode[0]);

                    array_push($arrayApi, $table);
                }
            }
        }

        //web result
        $web = array(
            "listApi" => $arrayApi
        );

        return Reply::make("help", 200, $web);
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
