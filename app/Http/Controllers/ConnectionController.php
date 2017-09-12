<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\ViewElement;
use App\Http\Classes\Reply;
use App\Http\Models\User;

use App;
use Hash;
use Input;
use Session;
use Validator;

class ConnectionController extends Controller
{
    //GET /connection
    public function index()
    {
        if(Session::has("userLogin"))
        {
            return Reply::redirect("service", 200);
        }
        else
        {
            return Reply::make("connection", 200);
        }
    }

    //POST /connection
    public function store()
    {
        $rules = array(
            "login" => "required|min:4|max:40|exists:user,login",
            "pass"  => "required|min:8|max:20"
        );

        $Validation = Validator::make(Input::all(), $rules);

        if($Validation->fails())
        {
            return Reply::redirect("connection", 400, $Validation);
        }

        $User = User::where("login", Input::get("login"))->first();

        if(Hash::check(Input::get("pass"), $User->password))
        {
            //set session
            Session::put("idUser", $User->id);
            Session::put("userLogin", $User->login);
            Session::put("lang", $User->lang);

            App::setLocale($User->lang);

            return Reply::redirect("service", 202);
        }
        else
        {
            return Reply::make("connection", 403);
        }
    }

    //GET /connection/<action>/edit
    public function edit($off)
    {
        if($off == "off")
        {
            $langSession = Session::get("lang");

            Session::flush();

            Session::put("lang", $langSession);

            if(strpos($_SERVER["HTTP_USER_AGENT"], "Mobile Safari/534.30") !== false)
            {
                return Reply::redirect("connection", 202);
            }

            return Reply::redirect("/", 202);
        }
        else
        {
            return Reply::make("pageError", 404);
        }
    }
}
