<?php
require_once './controllers/userController.php';
require_once './config/dbConfig.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'register';

switch($action){
    case 'register':
        $userController = new userController($conn);
        $userController->viewRegister();
        break;
}

?>