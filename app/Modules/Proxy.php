<?php

namespace App\Modules;

use App\Interfaces\ProxyInterface;

class Proxy implements ProxyInterface{

    protected $client;

    public function __construct($client){

        $this->client = $client;

    }

    public function getRequest($body){

        $request=$this->client->request('GET', '/'.$body);

        return $request->getBody()->getContents();
        
    }
    
}

?>