<?php

namespace App\Http\Classes;

class Tools
{
    //argument : stringUrlToTest
    public static function testUrl($url)
    {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);

        $result = curl_exec($curl);

        if( ($result === true) && (curl_getinfo($curl, CURLINFO_HTTP_CODE) == 200) )
        {
            return true;
        }

        return false;
    }
}
