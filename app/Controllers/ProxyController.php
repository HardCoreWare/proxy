<?php

namespace App\Controllers;

class ProxyController extends Controller{

    public function get($request,$response,$args){

        $base = $args['base'];
        $body = $args['body'];

        $finder=$this->c['finder'];
        $settings=$finder->getSettings($base);

        $proxy=$this->c['proxy']($settings);

        $content=$proxy->getRequest($body);
        $response->getBody()->write($content);

        return $response->withHeader('Content-type', 'application/json');

    }

}

?>

