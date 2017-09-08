<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\Reply;
use App\Http\Models\User;

use Session;

class HomeController extends Controller
{
    //GET /
    public function index()
    {
        $mailValue  = "";
        $imageIntro = "/image/intro.jpg";

        if(Session::has("idUser"))
        {
            $User = User::find(Session::get("idUser"));

            $mailValue  = $User->email;
            $imageIntro = "";
        }

        $reply = array(
            "imageIntro"    => $imageIntro,
            "mailValue"     => $mailValue
        );

        return Reply::make("home", 200, $reply);
    }
}
