<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\Record;
use App\Http\Classes\Reply;
use App\Http\Classes\SendMail;
use App\Http\Classes\Tools;
use App\Http\Models\User;

use Hash;
use Image;
use Input;
use Session;
use Validator;

class AccountController extends Controller
{
    //GET /account
    //GET /api/account
    public function index()
    {
        $api = array(
            "id" => Session::get("idUser")
        );

        $reply = array(
            "api" => $api
        );

        return Reply::make("account", 200, $reply);
    }

    //GET /account/{idUser}
    //GET /api/account/{idUser}
    public function show($idUser)
    {
        //get accountOption page
        $User   = User::find($idUser);
        $email  = trans("accountOption.email");
        $avatar = $User->urlAvatar;

        if($User->emailIsValid == 0)
        {
            $email = trans("accountOption.emailNoValid");
        }

        if(Tools::testUrl($avatar) !== true)
        {
            $avatar = null;
        }

        $api = array(
            "email"         => $User->email,
            "emailIsValid"  => $User->emailIsValid,
            "urlAvatar"     => $avatar,
            "lang"          => $User->lang
        );

        $reply = array(
            "urlUpdate"         => "/account/" . $User->id,
            "email"             => $email,
            "userEmail"         => $User->email,
            "userEmailIsValid"  => $User->emailIsValid,
            "userUrlAvatar"     => $avatar,
            "userLang"          => $User->lang,
            "api"               => $api
        );

        return Reply::make("accountOption", 200, $reply);
    }

    //POST /account
    public function store()
    {
        //create rules for check input
        $rules = array(
            "login" => "required|min:4|max:40|unique:user,login",
            "pass"  => "required|min:8|max:20",
            "email" => "required|max:250|email"
        );

        $Validation = Validator::make(Input::all(), $rules);

        if($Validation->fails())
        {
            return Reply::back(400, $Validation);
        }

        //create new account
        $User = new User;

        $User->login            = Input::get("login");
        $User->password         = Hash::make(Input::get("pass"));
        $User->email            = Input::get("email");
        $User->emailIsValid     = 0;
        $User->socialNetwork    = env("APP_NAME");
        $User->urlAvatar        = null;
        $User->dateRegistration = date("Y-m-d");
        $User->lang             = Session::get("lang");
        $User->isAdmin          = 0;

        //save it
        Record::save($User, "Create a new user.");

        //set session
        Session::put("idUser", $User->id);
        Session::put("userLogin", $User->login);

        //send email
        SendMail::userView($User, "createAccount");

        //return collection
        return Reply::redirect("service", 202);
    }

    //PUT /account/{idUser}
    public function update($idUser)
    {
        //get User
        $User = User::find($idUser);

        //rules for check input
        $rules = array(
            "userEmail"     => "required|max:250|email",
            "userLang"      => "required|in:fr,en"
        );

        //rules only if userPass is defined
        if(Input::get("userPass") !== null)
        {
            $rules["userPass"] = "min:8|max:20";

            $User->password = Hash::make(Input::get("userPass"));
        }

        //rules for urlAvatar
        $imageError     = "";
        $updateImage    = 0;

        if(Input::get("userUrlAvatar") !== null)
        {
            if(Input::get("userUrlAvatar") != $User->urlAvatar)
            {
                $rules["userUrlAvatar"] = "required|url";

                //test url image
                if(Tools::testUrl(Input::get("userUrlAvatar")) !== true)
                {
                    $imageError = trans("validation.badUrl");
                }
                else
                {
                    //file is real image ?
                    $tabImageInfo = getimagesize(Input::get("userUrlAvatar"));

                    if(!is_array($tabImageInfo))
                    {
                        $imageError = trans("validation.noImage");
                    }
                }

                $updateImage = 1;
            }
        }
        else
        {
            $User->urlAvatar = null;
        }

        $Validation = Validator::make(Input::all(), $rules);

        if( ($Validation->fails()) || ($imageError != "") )
        {
            $Validation->errors()->add("userUrlAvatar", $imageError);

            return Reply::back(400, $Validation);
        }

        if($updateImage == 1)
        {
            //save new image
            $timeNoCache = time();

            if (substr(env("APP_ENV"), -1) == "/")
            {
                $pathImage = env("APP_ENV") ."public/image/cover/avatar_" . $User->id . "_" . $timeNoCache . ".jpg";
            }
            else
            {
                $pathImage = env("APP_ENV") ."/public/image/cover/avatar_" . $User->id . "_" . $timeNoCache . ".jpg";
            }

            Image::make(Input::get("userUrlAvatar"))->resize(96, 96)->save($pathImage);

            if (substr(env("APP_URL"), -1) == "/")
            {
                $User->urlAvatar = env("APP_URL") . "image/cover/avatar_" . $User->id . "_" . $timeNoCache . ".jpg";
            }
            else
            {
                $User->urlAvatar = env("APP_URL") . "/image/cover/avatar_" . $User->id . "_" . $timeNoCache . ".jpg";
            }
        }

        //update User and save it
        $sendMail = 0;

        if($User->email != Input::get("userEmail"))
        {
            $User->email        = Input::get("userEmail");
            $User->emailIsValid = 0;

            $sendMail = 1;
        }

        $User->lang = Input::get("userLang");

        Session::put("lang", Input::get("userLang"));

        Record::save($User, "User updated by user.");

        if($sendMail == 1)
        {
            SendMail::userView($User, "createAccount");
        }

        return Reply::redirect("account/" . $idUser, 202);
    }

    //DELETE /account/{idUser}
    public function destroy($idUser)
    {
        //get User
        $User = User::find($idUser);

        //remove User
        Record::remove($User, "Remove an user account.");

        //restart session
        $langSession = Session::get("lang");

        Session::flush();

        Session::put("lang", $langSession);

        return Reply::redirect("/", 202);
    }
}
