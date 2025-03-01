<?php
require_once './models/User.php';

class userController{
    private $conn;
    private $userModel;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->userModel = new User($conn);

    }

    public function viewRegister(){
        include './views/account.php';
    }

    public function handleRegister(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $username = $_POST['first'];
            $password = $_POST['password'];

            $confirmPassword = $_POST['passwordC'];

            $errors = [];

            if(empty($username)){
                $errors[] = "Username is required";
            }
            if (empty($password)) {
                $errors[] = "Password is required";
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
                    echo "test";
                    // Registration successful
                } else {
                    $errors[] = "Username already exists or registration failed";
                }
            }

            return $errors;
        }
        return [];

    }

    public function handleLogin(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            // Validate input
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';
            
            $errors = [];
            
            // Validate username and password
            if (empty($username)) {
                $errors[] = "Username is required";
            }
            
            if (empty($password)) {
                $errors[] = "Password is required";
            }
            
            // If validation passes, attempt login
            if (empty($errors)) {
                $userData = [
                    'username' => $username,
                    'password' => $password
                ];
                
                if ($this->userModel->login($userData)) {
                    // Login successful
                    header("Location: dashboard.php");
                    exit;
                } else {
                    $errors[] = "Invalid username or password";
                }
            }
            
            return $errors;
        }
        
        return [];
    }

    public function handleLogout() {
        if (isset($_GET['logout'])) {
            $this->userModel->logout();
            header("Location: login.php");
            exit;
        }
    }
    
    public function getCurrentUser() {
        if ($this->userModel->isLoggedIn()) {
            return $this->userModel->getUserById($_SESSION['user_id']);
        }
        return null;
    }
    
    public function requireLogin() {
        if (!$this->userModel->isLoggedIn()) {
            header("Location: login.php");
            exit;
        }
    }
}

?>