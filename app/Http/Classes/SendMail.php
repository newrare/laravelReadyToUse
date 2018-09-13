<?php

namespace App\Http\Classes;

use App\Http\Models\User;

use App;
use Log;
use Mail;
use Session;

class SendMail
{
    //argument: ObjectUser, stringView
    public static function userView($User, $view)
    {
        //get variable for function Mail
        $directory  = "email." . $User->lang . "." . $view;
        $login      = $User->login;
        $email      = $User->email;

        //data dynamic inside mail
        $toMail = strrev($email);
        $mailEncrypt = base64_encode($toMail);
        $mailEncrypt = str_replace("=", "_", $mailEncrypt);
        $mailEncrypt = $User->id . "/" . $mailEncrypt;

        $data = array(
            "lang"          => $User->lang,
            "userLogin"     => $login,
            "mailEncrypt"   => $mailEncrypt
        );

        //set app
        App::setLocale($User->lang);

        //send
        Mail::send($directory, $data, function($m) use ($email, $login, $view){
            $m->to($email, $login)->subject(trans("email." . $view));
        });

        //log
        Log::info('Send Email to user', array(
            "idUser"    => $User->id,
            "userLogin" => $User->login,
            "mailTo"    => $User->email
        ));

        return true;
    }

    //argument : stringMailFrom, stringSubject, stringMessage
    public static function direct($mailFrom, $mailSubject, $mailMessage)
    {
        $ListUser = User::where("isAdmin", 1)->get();

        foreach($ListUser as $User)
        {
            $mailTo     = $User->email;
            $mailUser   = $User->login;
            $mailLang   = $User->lang;
            $directory  = "email." . $mailLang . ".directSend";

            //data dynamic inside mail
            $data = array(
                "lang"          => $mailLang,
                "userLogin"     => $mailUser,
                "mailFrom"      => $mailFrom,
                "mailMessage"   => $mailMessage
            );

            //send
            Mail::send($directory, $data, function($m) use ($mailTo, $mailUser, $mailSubject){
                $m->to($mailTo, $mailUser)->subject(trans("email.directSend") . $mailSubject);
            });
        }

        return true;
    }
}
