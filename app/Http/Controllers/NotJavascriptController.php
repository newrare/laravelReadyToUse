<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\ViewElement;

class NotJavascriptController extends Controller
{
    public function getPage()
    {
        $result = ViewElement::getData("notJavascript");

        $result["noRedirectJavascript"] = 1;

        return view("notJavascript", $result);
    }
}
