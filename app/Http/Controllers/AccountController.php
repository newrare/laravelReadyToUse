<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\Record;
use App\Http\Classes\Reply;
use App\Http\Classes\SendMail;
use App\Http\Classes\Tools;
use App\Http\Models\User;
use App\Http\Models\Item;

use Hash;
use Image;
use Input;
use Session;
use Validator;

class AccountController extends Controller
{
    //GET /account
    public function index()
    {
        if(Session::has("idUser"))
        {
            //get accountOption page
            $User   = User::find(Session::get("idUser"));
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

            $reply = array(
                "urlUpdate"         => "/account/" . $User->id,
                "email"             => $email,
                "userEmail"         => $User->email,
                "userEmailIsValid"  => $User->emailIsValid,
                "userUrlAvatar"     => $avatar,
                "userLang"          => $User->lang
            );

            return Reply::make("accountOption", 200, $reply);
        }
        else
        {
            //get account connection page
            $reply = array(
                "isCreate" => true
            );

            return Reply::make("account", 200, $reply);
        }
    }

    //GET /account/email/edit
    public function edit($action)
    {
        if($action == "email")
        {
            //test if user is connected
            if(!Session::has("idUser"))
            {
                return Reply::make("connection", 401);
            }

            //test if idUser exist
            if(!User::find(Session::get("idUser")))
            {
                return Reply::redirect("service", 400);
            }

            $User = User::find(Session::get("idUser"));

            SendMail::validEmailAccount($User->email);

            return Reply::redirect("account", 204);
        }
        else
        {
            return Reply::make("pageError", 404);
        }
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
        SendMail::validEmailAccount($User->email);

        //return collection
        return Reply::redirect("service", 202);
    }

    //PUT /account/<idUser>
    public function update($idUser)
    {
        //test if user is connected
        if(!Session::has("idUser"))
        {
            return Reply::make("connection", 401);
        }

        //test if idUser exist
        if(!User::find($idUser))
        {
            return Reply::redirect("service", 400);
        }

        $User = User::find($idUser);

        //test if userSession is same to idUser (or admin)
        if( ($User->isAdmin == 0) && (Session::get("idUser") != $idUser) )
        {
            return Reply::redirect("service", 400);
        }

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
            SendMail::validEmailAccount($User->email);
        }

        return Reply::redirect("account", 202);
    }

    //DELETE /account/<idUser>
    public function destroy($idUser)
    {
        //test if user is connected
        if(!Session::has("idUser"))
        {
            return Reply::make("connection", 401);
        }

        //test if idUser exist
        if(!User::find($idUser))
        {
            return Reply::redirect("service", 400);
        }

        //get userSession and UserToKill
        $UserSession    = User::find(Session::get("idUser"));
        $UserToKill     = User::find($idUser);

        //test if UserSession is same to idUser (or if UserSession is admin)
        if( ($UserSession->isAdmin == 0) && (Session::get("idUser") != $idUser) )
        {
            return Reply::redirect("service", 400);
        }

        //remove User
        Record::remove($UserToKill, "Remove an user account.");

        //remove all items for this User
        $ListItem = Item::where("idUser", $idUser)->get();

        foreach ($ListItem as $Item)
        {
            Record::remove($Item, "Remove all items for this user because this account is deleted.");
        }

        //restart session
        $langSession = Session::get("lang");

        Session::flush();

        Session::put("lang", $langSession);

        return Reply::redirect("/", 202);
    }
}
