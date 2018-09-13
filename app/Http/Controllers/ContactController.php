<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\Reply;
use App\Http\Classes\SendMail;
use App\Http\Models\User;

use Input;
use Session;
use Validator;

class ContactController extends Controller
{
    //GET /contact
    public function index()
    {
        $mailValue = "";

        if(Session::has("idUser"))
        {
            $User = User::find(Session::get("idUser"));

            $mailValue = $User->email;
        }

        $reply = array(
            "mailValue" => $mailValue
        );

        return Reply::make("contact", 200, $reply);
    }

    //POST /contact
    public function store()
    {
        $rules = array(
            "contactMail"       => "required|email",
            "contactSubject"    => "required|max:80",
            "contactMessage"    => "required",
        );

        $Validation = Validator::make(Input::all(), $rules);

        if($Validation->fails())
        {
            return Reply::redirect("/contact", 400, $Validation);
        }

        //send mail
        SendMail::direct(Input::get("contactMail"), Input::get("contactSubject"), Input::get("contactMessage"));

        return Reply::back(202);
    }
}
