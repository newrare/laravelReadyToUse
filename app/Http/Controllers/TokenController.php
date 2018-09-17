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
    //GET /api/token
    public function index()
    {
        //get all token api
        $ListApi = Api::where("idUser", Session::get("idUser"))->orderBy("name")->get();

        //parse Api list
        $arrayIdApi = array();

        foreach ($ListApi as $Api)
        {
            array_push($arrayIdApi, $Api->id);
        }

        sort($arrayIdApi);

        //create result api
        $api = array(
            "id" => $arrayIdApi
        );

        //create result web
        $web = array(
            "ListApi" => $ListApi
        );

        return Reply::make("token", 200, $web, $api);
    }

    //POST /token
    //POST /api/token
    public function store()
    {
        //check token name
        $rules = array(
            "name" => "required|max:20"
        );

        $Validation = Validator::make(Input::all(), $rules);

        if($Validation->fails())
        {
            return Reply::back(400, $Validation);
        }

		//create new token ID and key
        $tokenId 	= substr(str_shuffle(str_repeat("23456789aAbBDdeEfFGghHijJMmnNPpqQRrtTYy", 10)), 0, 10);
		$tokenKey 	= substr(str_shuffle(str_repeat("23456789aAbBDdeEfFGghHijJMmnNPpqQRrtTYy", 20)), 0, 20);

		//save new token
        $Api = new Api;

        $Api->idUser    = Session::get("idUser");
        $Api->name 		= Input::get("name");
        $Api->tokenId 	= $tokenId;
        $Api->tokenKey  = $tokenKey;

        //save it
        Record::save($Api, "Save a new token api.");

        //return collection
        return Reply::redirect("/token", 202);
    }

    //GET /api/token/{idToken}
    public function show($idToken)
    {
        //get Token
        $Api = Api::find($idToken);

        //check it
        if($Api === null)
        {
            return Reply::json("404");
        }

        $api = array(
            "name"      => $Api->name,
            "tokenId"   => $Api->tokenId,
            "tokenKey"  => $Api->tokenKey
        );

        return Reply::json("202", $api);
    }

    //DELETE /api/token/{idToken}
    public function destroy($idToken)
    {
        //get Token
        $Api = Api::find($idToken);

        //check it
        if($Api === null)
        {
            return Reply::json("404");
        }

        //delete it
        Record::remove($Api, "Api deleted by user or admin.");

        return Reply::json("202");
    }
}
