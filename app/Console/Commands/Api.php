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
        $method = $this->argument("method");
        $url    = $this->argument("url");
        $data   = $this->argument("data");

        $this->info($method);
        $this->info($url);

        if($data != "")
        {
            $this->info($data);
        }

        //curl -i -H "Accept: application/json" -H "Content-Type: application/json" -H "Authorization: Basic SmQ1ZmQ5QXRNRw==:ZERnTTdIRmloNTZSVHFGZWgzZTc=" http://localhost:8080/api/account
    }
}
