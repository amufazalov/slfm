<?php
//Маршрутизаторы
$app->get('/article/{name}', function($request, $response, $args){
    return $this->view->render($response, 'home.phtml', [
        'a' => $args['name']
    ]);
});

$app->get('/', 'MainController:index');
$app->get('/parser/', 'ParseController:index');


/**

$app->get('/', function($request, $response, $args){
	
    return $this->view->render($response, 'home.phtml', [
        'a' =>  $name
    ]);
});

*/

