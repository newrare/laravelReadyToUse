<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\Reply;
use App\Http\Classes\SendMail;
use App\Http\Models\User;

use Hash;
use Input;
use Validator;

class LostController extends Controller
{
    //GET /lost
    public function index()
    {
        return Reply::make("lost", 200);
    }

    //PUT /lost
    public function store()
    {
        //check email
        $rules = array(
            "email" => "required|max:250|email|exists:user"
        );

        $Validation = Validator::make(Input::all(), $rules);

        if($Validation->fails())
        {
            return Reply::back(400, $Validation);
        }

        //get list account
        $ListUser = User::where("email", Input::get("email"))->get();

        foreach($ListUser as $User)
        {
            //send email
            SendMail::userView($User, "lost");
        }

        return Reply::redirect("/", 204);
    }
}
