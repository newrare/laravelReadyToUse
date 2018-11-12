<?php

namespace App\Http\Classes;

use App\Http\Classes\ViewElement;

use Request;
use Response;
use Session;

class Reply
{
    //argument : intCodeState, arrayApi (optional)
    public static function json($code, $api = [])
    {
        //get message
        $error = ViewElement::getData("error");

        $message = $error[$code];

        //update code for api
        if( ($code == 204) or ($code == 202) )
        {
            $code = 200;
        }

        $json = array(
            "code"      => $code,
            "message"   => $message,
            "result"    => $api
        );

        return Response::json($json, $code);
    }

    //argument : stringViewName, intCodeState, arrayWeb (optional), arrayApi (optional)
    public static function make($viewName, $code, $web = [], $api = [])
    {
        //check api
        if(Request::isJson())
        {
            return self::json($code, $api);
        }

        $result = ViewElement::getData($viewName);
        $error  = ViewElement::getData("error");

        //ok without good message
        if($code == 200)
        {
            //nothing
        }
        //ok with good message
        elseif($code == 202)
        {
            $result["messageDone"]  = $error[$code];
        }
        //ko with bad message
        else
        {
            $result["messageError"] = $error[$code];
        }

        $result["web"] = $web;
        $result["api"] = $api;

        return view($viewName)->with("data", $result);
    }

    //argument : intCodeState, objectValidation (optional)
    public static function back($code, $Validation = "")
    {
        //check api
        if(Request::isJson())
        {
            $api = array();

            if($code == 400)
            {
                $api = $Validation->messages();
            }

            return self::json($code, $api);
        }

        $error = ViewElement::getData("error");

        if($code == 400)
        {
            Session::flash("messageError", $error[$code]);

            return redirect()->back()->withErrors($Validation)->withInput();
        }
        else
        {

            return redirect()->back()->with("messageDone", $error[$code]);
        }
    }

    //argument : stringUrlInterne, intCodeState, objectValidation (optional)
    public static function redirect($urlInterne, $code, $Validation = "")
    {
        //check api
        if(Request::isJson())
        {
            $api = array();

            if($code == 400)
            {
                $api = $Validation->messages();
            }

            return self::json($code, $api);
        }

        $error = ViewElement::getData("error");

        if($code == 200)
        {
            return redirect($urlInterne);
        }
        elseif($code == 202 || $code == 204)
        {
            return redirect($urlInterne)->with("messageDone", $error[$code]);
        }
        elseif( (isset($Validation)) && ($Validation != "") )
        {
            Session::flash("messageError", $error[$code]);

            return redirect($urlInterne)->withErrors($Validation)->withInput();
        }
        //ko with bad message
        else
        {
            return redirect($urlInterne)->with("messageError", $error[$code]);
        }
    }
}
