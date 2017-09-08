<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\Record;
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

        //create new code
        $random = substr(str_shuffle(str_repeat("23456789aAbBDdeEfFGghHijJMmnNPpqQRrtTYy", 10)), 0, 10);

        //get list account
        $ListUser = User::where("email", Input::get("email"))->get();

        $stringUser = "";

        foreach($ListUser as $User)
        {
            //update User with hash
            $User->password = Hash::make($random);

            $stringUser .= " " . $User->login;

            Record::save($User, "Update password by lost page.");
        }

        //send email
        SendMail::lostPassword($User->email, $random, $stringUser);

        return Reply::redirect("/connection", 204);
    }
}
