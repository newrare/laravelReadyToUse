<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\Record;
use App\Http\Classes\Reply;
use App\Http\Models\User;

use Hash;
use Session;
use Socialite;

class GoogleController extends Controller
{
    private static function testLogin($login)
    {
        if(User::where("login", $login)->first())
        {
            $login .= "_";

            return self::testLogin($login);
        }
        else
        {
            return $login;
        }
    }

    public function redirectToProvider()
    {
        return Socialite::driver("google")->redirect();
    }

    public function handleProviderCallBack()
    {
        $UserGoogle = Socialite::driver("google")->user();

        $idGoogle = "google_" . $UserGoogle->getId();

        $User = User::where("socialNetwork", $idGoogle)->first();

        if(!$User)
        {
            //create new account
            $User = new User;

            $arrayLogin = explode("@", $UserGoogle->getEmail());
            $login      = self::testLogin($arrayLogin[0]);

            $User->login            = $login;
            $User->password         = Hash::make($idGoogle);
            $User->email            = $UserGoogle->getEmail();
            $User->emailIsValid     = 1;
            $User->socialNetwork    = $idGoogle;
            $User->urlAvatar        = str_replace("?sz=50", "?sz=97", $UserGoogle->getAvatar());
            $User->dateRegistration = date("Y-m-d");
            $User->lang             = Session::get("lang");
            $User->isAdmin          = 0;

            //save it and set session
            Record::save($User, "Create a new user by Google.");
        }

        //set session
        Session::put("idUser", $User->id);
        Session::put("userLogin", $User->login);

        //return collection
        return Reply::redirect("service", 202);
    }
}
