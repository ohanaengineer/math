<?php
namespace Math\Util;

class Curl {
    public function exec($url){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $res =  curl_exec($ch);
        curl_close($ch);
        return $res;
    }
}
