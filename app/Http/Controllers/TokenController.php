<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\Record;
use App\Http\Classes\Reply;
use App\Http\Models\Api;

use Input;
use Session;
use Validator;

class TokenController extends Controller
{
    //GET /token
    public function index()
    {
        //get all token api
        $ListApi = Api::where("idUser", Session::get("idUser"))->orderBy("name", "desc")->get();

        //return result
        $reply = array(
            "ListApi" => $ListApi
        );

        return Reply::make("token", 200, $reply);
    }

     //POST /token
     public function store()
     {
        //check token name
        $rules = array(
            "tokenName" => "required|max:100"
        );

        $Validation = Validator::make(Input::all(), $rules);

        if($Validation->fails())
        {
            return Reply::back(400, $Validation);
        }

		//create new token ID and key
        $tokenId 	= substr(str_shuffle(str_repeat("23456789aAbBDdeEfFGghHijJMmnNPpqQRrtTYy", 50 )), 0, 50);
		$tokenKey 	= substr(str_shuffle(str_repeat("23456789aAbBDdeEfFGghHijJMmnNPpqQRrtTYy", 100)), 0, 100);

        //get list account
        Input::get("tokenName");

		//save new blog
        $Api = new Api;

        $Api->idUser    = Session::get("idUser");
        $Api->name 		= Input::get("tokenName");
        $Api->tokenId 	= $tokenId;
        $Api->tokenKey  = $tokenKey;

        //save it
        Record::save($Api, "Save a new token api.");

        //return collection
        return Reply::redirect("/token", 202);
     }
}
