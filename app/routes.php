<?php
//Маршрутизаторы
$app->get('/home/{name}', function($request, $response, $args){
    return $this->view->render($response, 'home.phtml', [
        'name' => $args['name']
    ]);
})->setName('profile');
