<?php

namespace Hcode\Pagseguro;

use \GuzzleHttp\Client;

class Transporter {
    
    //Comunicação
    public static function createSession()
    {
        $client = new Client();
        $res = $client->request('POST', Config::getUrlSessions() . "?" . http_build_query(Config::getAuthentication()), [
            'verify'=>false
        ]);
    
        $xml = simplexml_load_string($res->getBody()->getContents());

        return ((string)$xml->id);
    }
}