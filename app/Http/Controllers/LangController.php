<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\ViewElement;
use App\Http\Classes\Reply;

use App;
use Session;

class LangController extends Controller
{
    //GET /lang/<idLang>/edit
    public function edit($lang)
    {
        $allLang = array("en", "fr");

        if(in_array($lang, $allLang))
        {
            Session::put("lang", $lang);

            App::setLocale($lang);

            return Reply::back(202);
        }
        else
        {
            return Reply::make("pageError", 404);
        }
    }
}
