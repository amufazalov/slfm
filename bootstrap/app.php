<?php
session_start();
require '../vendor/autoload.php';

//Настройки
$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

// Контейнер зависимостей
$container = $app->getContainer();

// Регистрируем новый компонент в контейнере
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer(__DIR__ . '/../resources/views');
};

$container['MainController'] = function ($container) {
	return new \App\Controllers\MainController($container);
};

$container['ParseController'] = function ($container) {
	return new \App\Controllers\ParseController($container);
};

require_once '../app/routes.php';