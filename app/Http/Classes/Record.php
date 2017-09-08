<?php

namespace App\Http\Classes;

use Request;
use Session;
use Log;

class Record
{
    //argument : Object, stringMessage, stringMethodName
    private static function createLog($Object, $message, $who)
    {
        $idUser = 0;
        $json   = false;

        if(Session::has("idUser"))
        {
            $idUser = Session::get("idUser");
        }

        if(Request::isJson())
        {
            $json = true;
        }

        Log::info($who, array(
            "url"           => Request::url(),
            "json"          => $json,
            "ObjectName"    => get_class($Object),
            "idUser"        => $idUser,
            "message"       => $message,
            "Object"        => $Object,
        ));
    }

    //argument : Object, stringMessage
    public static function save($Object, $message)
    {
        $Object->save();

        self::createLog($Object, $message, "Record::save");

        return true;
    }

    //argument : Object, stringMessage
    public static function remove($Object, $message)
    {
        $Object->delete();

        self::createLog($Object, $message, "Record::delete");

        return true;
    }
}
