<?php

namespace App\Modules;

use App\Interfaces\FinderInterface;

class Finder implements FinderInterface{

    public function getSettings($base){

        $jsonServices=file_get_contents('../app/files/urls.json');
        $services=json_decode($jsonServices,true);
        $settings=$services[$base]['settings'];

        return $settings;

    }

    public function getCookies($base){

        $jsonServices=file_get_contents('../app/files/urls.json');
        $services=json_decode($jsonServices,true);
        $cookies=$services[$base]['cookies'];

    }
    
}

?>