<?php

namespace App\Http\Classes;

use App\Http\Models\User;

use Log;
use Mail;
use Session;

class SendMail
{
    //argument : stringMailTo
    public static function validEmailAccount($mailTo)
    {
        //get elements in session for create mail
        $mailLang = Session::get("lang");
        $mailUser = Session::get("userLogin");

        //path for view mail
        $directory = "email." . Session::get("lang") . ".createAccount";

        //data dynamic inside mail
        $toMail = strrev($mailTo);
        $mailEncrypt = base64_encode($toMail);
        $mailEncrypt = str_replace("=", "_", $mailEncrypt);
        $mailEncrypt = Session::get("idUser") . "/" . $mailEncrypt;

        $data = array(
            "lang"          => $mailLang,
            "userLogin"     => $mailUser,
            "mailEncrypt"   => $mailEncrypt
        );

        //send
        Mail::send($directory, $data, function($m) use ($mailTo, $mailUser){
            $m->to($mailTo, $mailUser)->subject(trans("email.createAccount"));
        });

        //log
        Log::info('Send Email to user', array(
                "idUser"    => Session::get("idUser"),
                "userLogin" => $mailUser,
                "mailTo"    => $mailTo
        ));

        return true;
    }

    //argument : stringMailFrom, stringSubject, stringMessage
    public static function directSend($mailFrom, $mailSubject, $mailMessage)
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

    //argument : ObjectUser, stringNewCode, $stringListLogin
    public static function lostPassword($mailTo, $newCode, $stringUser)
    {
        $directory  = "email." . Session::get("lang") . ".lost";

        //data dynamic inside mail
        $data = array(
            "lang"      => Session::get("lang"),
            "userLogin" => $stringUser,
            "newCode"   => $newCode
        );

        //send
        Mail::send($directory, $data, function($m) use ($mailTo, $stringUser){
            $m->to($mailTo, $stringUser)->subject(trans("email.lostPassword"));
        });

        return true;
    }
}
