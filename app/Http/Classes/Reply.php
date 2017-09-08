<?php

namespace App\Http\Classes;

use App\Http\Classes\ViewElement;

use Request;
use Response;
use Session;

class Reply
{
    //argument : intCodeState, stringViewName, arrayViewElement, arrayReply (optional)
    public static function json($code, $viewName, $viewElement, $reply = [])
    {
        $error = ViewElement::getData("error");

        return array(
            "lang"          => Session::get("lang"),
            "codeState"     => $code,
            "message"       => $error[$code],
            "viewName"      => $viewName,
            "viewElement"   => $viewElement,
            "reply"         => $reply
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
                self::json($code, $viewName, $result, $reply),
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
            $reply = array();

            if($code == 400)
            {
                $reply = $Validation->messages();
            }

            return Response::json(
                self::json($code, "", array(), $reply),
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
            return Response::json(
                self::json($code, "", array()),
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
