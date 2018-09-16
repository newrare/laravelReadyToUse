<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Api extends Command
{
    protected $signature    = "action:api {idUser} {method} {url} {data?}";
    protected $description  = "Use this command for test an API call";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $idUser     = $this->argument("idUser");
        $method     = $this->argument("method");
        $urlShort   = $this->argument("url");
        $data       = $this->argument("data");

        //get url
        $url = env("APP_URL") . $urlShort;

        //show argument value
        $this->info("User id: " . $idUser);
        $this->info("Method : " . $method);
        $this->info("Url    : " . $url);

        if($data != "")
        {
            $this->info("Data   : " . $data);
        }

        //get token in bdd
        $Api = \App\Http\Models\Api::where("idUser", $idUser)->first();

        if($Api === null)
        {
            $this->error("This user ID has not found in table api.");
            exit;
        }

        //set token
        $tokenId    = base64_encode($Api->tokenId);
        $tokenKey   = base64_encode($Api->tokenKey);

		//Set up curl
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json; charset=UTF-8",
            "Accept: application/json; charset=UTF-8",
			"Authorization: Basic " . $tokenId . ":" . $tokenKey,
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);

        //start command
        $resultCurl = curl_exec($ch);

        curl_close($ch);

        //format result
        $arrayResult    = explode("\n", $resultCurl);
        $stringJson     = end($arrayResult);
        $json           = json_decode($stringJson);
        $jsonEncode     = json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $result         = str_replace("\\", "", $jsonEncode);

        //show result api
        $this->info($result);
    }
}
