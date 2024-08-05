<?php require_once './Views/templates/header.php'?>
<?php 


   
    require_once '../config/Db_connection.php';
    require_once  './Controllers/UserController.php';
    require_once './Models/AddUser.php';
    require_once '../config/router.php';
    require_once './Models/GetUser.php';

    $conn = Db_connection::getPDO();
    $userModel = new AddUser($conn);
    $userControl = new UserController();
    $userData = new GetUser($conn);
    $userControl->connectModel($userModel);

    $errors = $userControl->getErrors();

    $userControl->setData($_POST);

    
?>
<?php require_once './Views/templates/footer.php'?>
