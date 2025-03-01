<?php
require_once './controllers/userController.php';
require_once './controllers/dataController.php';
require_once './config/dbConfig.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'register';

switch($action){
    case 'register':
        $userController = new userController($conn);
        $userController->viewRegister();
        $userController->handleRegister();
        break;
    case 'homeForm':
        $dataController=  new dataController($conn);
        $dataController->index();
        break;
    

}

?>