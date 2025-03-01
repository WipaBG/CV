<?php

class userController{
    private $conn;
    private $userModel;


    public function handleRegister(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['passwordC'];

            $errors = [];

            if(empty($username)){
                $errors[] = "Username is required";
            }
            if (empty($password)) {
                $errors[] = "Password is required";
            } elseif (strlen($password) < 6) {
                $errors[] = "Password must be at least 6 characters";
            }
            
            // Confirm passwords match
            if ($password !== $confirmPassword) {
                $errors[] = "Passwords do not match";
            }
            
            // If validation passes, register the user
            if (empty($errors)) {
                $userData = [
                    'username' => $username,
                    'password' => $password
                ];
                if ($this->userModel->register($userData)) {
                    // Registration successful
                    header("Location: dashboard.php");
                    exit;
                } else {
                    $errors[] = "Username already exists or registration failed";
                }
            }

            return $errors;
        }
        return [];
    }
}

?>