<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\Record;
use App\Http\Classes\Reply;
use App\Http\Classes\SendMail;
use App\Http\Classes\Tools;
use App\Http\Models\Api;
use App\Http\Models\Blog;
use App\Http\Models\User;

use App;
use Hash;
use Image;
use Input;
use Request;
use Session;
use Validator;

class AccountController extends Controller
{
    //GET /account
    //GET /api/account
    public function index()
    {
        //check Session
        if(!Session::has("idUser"))
        {
            return Reply::make("account", 200);
        }

        $User = User::find(Session::get("idUser"));

        $result = Session::get("idUser");

        if($User->isAdmin == 1)
        {
            $result = User::where("id", ">", 0)->pluck("id")->toArray();
        }

        $api = array(
            "id" => $result
        );

        return Reply::make("account", 200, "", $api);
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
            "login"         => $User->login,
            "email"         => $User->email,
            "emailIsValid"  => $User->emailIsValid,
            "urlAvatar"     => $avatar,
            "lang"          => $User->lang
        );

        $web = array(
            "urlUpdate" => "/account/" . $User->id,
            "email"     => $email,
        );

        return Reply::make("accountOption", 200, $web, $api);
    }

    //POST /account
    //POST /api/account
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
    //PUT /api/account/{idUser}
    public function update($idUser)
    {
        //get User
        $User = User::find($idUser);

        //rules for check input
        $rules = array(
            "email" => "required|max:250|email",
            "lang"  => "required|in:fr,en"
        );

        //rules only if pass is defined
        if(Input::get("pass") !== null)
        {
            $rules["pass"] = "min:8|max:20";

            $User->password = Hash::make(Input::get("pass"));
        }

        //rules for urlAvatar
        $imageError     = "";
        $updateImage    = 0;

        if(Input::get("urlAvatar") !== null)
        {
            if(Input::get("urlAvatar") != $User->urlAvatar)
            {
                $rules["urlAvatar"] = "required|url";

                //test url image
                if(Tools::testUrl(Input::get("urlAvatar")) !== true)
                {
                    $imageError = trans("validation.badUrl");
                }
                else
                {
                    //file is real image ?
                    $tabImageInfo = getimagesize(Input::get("urlAvatar"));

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
            if($imageError != "")
            {
                $Validation->errors()->add("urlAvatar", $imageError);
            }

            //add input info for api
            if(Request::isJson())
            {
                $Validation->errors()->add("pass", "(Optional)");

                if($imageError == "")
                {
                    $Validation->errors()->add("urlAvatar", "(Optional)");
                }
            }

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

        if($User->email != Input::get("email"))
        {
            $User->email        = Input::get("email");
            $User->emailIsValid = 0;

            $sendMail = 1;
        }

        $User->lang = Input::get("lang");

        Session::put("lang", Input::get("lang"));

        App::setLocale(Input::get("lang"));

        Record::save($User, "User updated by user.");

        if($sendMail == 1)
        {
            SendMail::userView($User, "createAccount");
        }

        return Reply::redirect("account/" . $idUser, 202);
    }

    //DELETE /api/account/{idUser}
    public function destroy($idUser)
    {
        //get all Object
        $User       = User::find($idUser);
        $ListApi    =  Api::where("idUser", $idUser)->get();
        $ListBlog   = Blog::where("idUser", $idUser)->get();

        //remove all Object
        Record::remove($User, "Remove an user account by user or admin.");

        foreach($ListApi as $Api)
        {
            Record::remove($Api, "Remove an user account by user or admin.");
        }

        foreach($ListBlog as $Blog)
        {
            Record::remove($Blog, "Remove an user account by user or admin.");
        }

        //restart session
        $langSession = Session::get("lang");

        Session::flush();

        Session::put("lang", $langSession);

        return Reply::json("202");
    }
}
