<?php

$request = $_SERVER["REQUEST_URI"];

require_once __DIR__ . '/Db_connection.php';
require_once __DIR__ . '/../src/Models/User.php';

$pdo = Db_connection::getPDO();
$userModel = new User($pdo);

switch ($request) {
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
