<?php

namespace App\Http\Classes;

use App\Http\Classes\ViewElement;

use Request;
use Response;
use Session;

class Reply
{
    //argument : intCodeState, arrayReply (optional)
    public static function json($code, $reply = [])
    {
        //check $reply
        if(count($reply) == 0)
        {
            $reply["api"] = array();
        }

        //get message
        $error = ViewElement::getData("error");

        return array(
            "code"      => $code,
            "message"   => $error[$code],
            "result"    => $reply["api"]
        );
    }

    //argument : stringViewName, intCodeState, arrayReply (optional)
    public static function make($viewName, $code, $reply = [])
    {
        $result = ViewElement::getData($viewName);
        $error  = ViewElement::getData("error");

        if(Request::isJson())
        {
            return Response::json(
                self::json($code, $reply),
                $code
            );
        }
        //ok without good message
        elseif($code == 200)
        {
            //nothing
        }
        //ok with good message
        elseif($code == 202)
        {
            $result["messageDone"] = $error[$code];
        }
        //ko with bad message
        else
        {
            $result["messageError"] = $error[$code];
        }

        $result["reply"] = $reply;

        return view($viewName)->with("data", $result);
    }

    //argument : intCodeState, objectValidation (optional)
    public static function back($code, $Validation = "")
    {
        if(Request::isJson())
        {
            $api = array();

            if($code == 400)
            {
                $api = $Validation->messages();
            }

            return Response::json(
                self::json($code, $api),
                $code
            );
        }
        elseif($code == 400)
        {
            return redirect()->back()->withErrors($Validation)->withInput();
        }
        else
        {
            $error = ViewElement::getData("error");

            return redirect()->back()->with("messageDone", $error[$code]);
        }
    }

    //argument : stringUrlInterne, intCodeState, objectValidation (optional)
    public static function redirect($urlInterne, $code, $Validation = "")
    {
        $error = ViewElement::getData("error");

        if(Request::isJson())
        {
            $api = array();

            if($code == 400)
            {
                $api = $Validation->messages();
            }

            return Response::json(
                self::json($code, $api),
                $code
            );
        }
        elseif($code == 200)
        {
            return redirect($urlInterne);
        }
        elseif($code == 202 || $code == 204)
        {
            return redirect($urlInterne)->with("messageDone", $error[$code]);
        }
        elseif( (isset($Validation)) && ($Validation != "") )
        {
            return redirect($urlInterne)->withErrors($Validation)->withInput();
        }
        //ko with bad message
        else
        {
            return redirect($urlInterne)->with("messageError", $error[$code]);
        }
    }
}
