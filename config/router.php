<?php

$request = $_SERVER["REQUEST_URI"];

require_once __DIR__ . '/Db_connection.php';
require_once __DIR__ . '/../src/Models/User.php';

$pdo = Db_connection::getPDO();
$userModel = new User($pdo);

//Объявляем переменную для хранения директории, которую мы хотим отрезать от URL.
// Это нужно для того, чтобы в дальнейшем сравнивать URL без директории.
$mainDir = '/my-pet-project/public';
// Отрезаем директорию от URL
$url = str_replace($mainDir, '', $request);

// Проверяем URL и подключаем нужный контроллер
switch ($url) {
    case '/':
        require '../src/Controllers/HomeController.php';
        $controller = new HomeController();
        $controller->homePage();
        break;
    case '/users':
        require '../src/Controllers/UserController.php';
        $controller = new UserController($userModel);
        $controller->userListPage();
        break;
    case '/users/add':
        require '../src/Controllers/UserController.php';
        $controller = new UserController($userModel);
        $controller->addUserPage($_POST);
        break;
    default:
        require '../src/Views/404.php';
        break;
}
