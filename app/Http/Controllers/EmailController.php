<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\Record;
use App\Http\Classes\Reply;
use App\Http\Models\User;

use Session;

class EmailController extends Controller
{
    public function getPage($idUser = null, $codeEmail = null)
    {
        if(!User::find($idUser))
        {
            if(Session::has("idUser"))
            {
                return Reply::redirect("item", 400);
            }
            else
            {
                return Reply::redirect("/", 400);
            }
        }

        $User = User::find($idUser);

        $mailDecrypt = str_replace("_", "=", $codeEmail);
        $mailDecrypt = base64_decode($mailDecrypt);
        $mailDecrypt = strrev($mailDecrypt);

        if($User->email == $mailDecrypt)
        {
            //update
            $User->emailIsValid = 1;

            //set session
            Session::put("idUser", $User->id);
            Session::put("userLogin", $User->login);

            //save it
            Record::save($User, "Email is valid.");

            return Reply::redirect("item", 202);
        }
        elseif(Session::has("idUser"))
        {
            return Reply::redirect("item", 400);
        }
        else
        {
            return Reply::redirect("/", 400);
        }
    }
}
