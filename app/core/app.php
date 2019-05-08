<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


$app = new \Slim\App(
    [
        'settings' => [
            'displayErrorDetails' => true,
            'responseChunkSize' => 8096
        ]
    ]
);

$container=$app->getContainer();

$container['finder']=function($container){

    return new App\Modules\Finder();

};

$container['proxy']=function ($container) {

    return function($params){

        return new App\Modules\Proxy(new GuzzleHttp\Client($params));

    };

};

//root
$app->get('/', function (Request $request, Response $response, array $args) {

    $response->getBody()->write("plataforma GCP");
    return $response;

});

//rutas del proxy
$app->get('/{base}[/{body:.*}]', '\App\Controllers\ProxyController:get');
$app->run();