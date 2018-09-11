<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\Record;
use App\Http\Classes\Reply;
use App\Http\Classes\SendMail;
use App\Http\Models\User;

use Session;

class EmailController extends Controller
{
    //GET /email/valid
    public function valid()
    {
        //get User
        $User = User::find(Session::get("idUser"));

        //send email validation
        SendMail::validEmailAccount($User->email);

        return Reply::redirect("account/" . Session::get("idUser"), 204);
    }

    //GET /email/{idUser}/{codeEmail}
    public function valided($idUser = null, $codeEmail = null)
    {
        //get User
        $User = User::find($idUser);

        //check User
        if($User === null)
        {
            return Reply::redirect("/", 400);
        }

        //decrypt code
        $mailDecrypt = str_replace("_", "=", $codeEmail);
        $mailDecrypt = base64_decode($mailDecrypt);
        $mailDecrypt = strrev($mailDecrypt);

        if($User->email == $mailDecrypt)
        {
            //update
            $User->emailIsValid = 1;

            //save it
            Record::save($User, "Email is valid.");

            if(Session::has("idUser"))
            {
                return Reply::redirect("service", 202);
            }
            else
            {
                return Reply::redirect("/", 202);
            }
        }
        else
        {
            return Reply::redirect("/", 400);
        }
    }
}
