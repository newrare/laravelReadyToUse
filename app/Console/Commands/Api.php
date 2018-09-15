<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Api extends Command
{
    protected $signature    = "action:api {method} {url} {data?}";
    protected $description  = "Use this command for test an API call";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $method     = $this->argument("method");
        $urlShort   = $this->argument("url");
        $data       = $this->argument("data");

        $this->info($method);
        $this->info($urlShort);

        if($data != "")
        {
            $this->info($data);
        }

        //get url
        $url = env("APP_URL") . $urlShort;

        //set token
        $tokenId    = base64_encode(env("USER_TOKEN_ID"));
        $tokenKey   = base64_encode(env("USER_TOKEN_KEY"));

		//Set up curl
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json; charset=UTF-8",
            "Accept: application/json; charset=UTF-8",
			"Authorization: Basic " . $tokenId . "." . $tokenKey,
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);

        $result = curl_exec($ch);

        curl_close($ch);

        $this->info($result);
    }
}
