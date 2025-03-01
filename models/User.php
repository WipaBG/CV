<?php
class User {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function register($data) {
        // Check if username already exists
        
        $checkStmt = $this->conn->prepare("SELECT id FROM users WHERE username = ?");
        $checkStmt->bind_param("s", $data['username']);
        $checkStmt->execute();
        $checkStmt->store_result();
        
        if ($checkStmt->num_rows > 0) {
            $checkStmt->close();
            return false;
        }
        $checkStmt->close();
        
        $password = $data['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $data['username'], $hashedPassword);
        
        if ($stmt->execute()) {
            $user_id = $stmt->insert_id;
            // Start session if not already started
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user_id'] = $user_id; // Store the user_id in session
            $stmt->close();
            return true; // Registration successful
        } else {
            $stmt->close();
            return false; // Registration failed
        }
    }
    
    public function login($data) {
        // Check if username and password are provided
        if (!isset($data['first']) || !isset($data['password'])) {
            return false;
        }
        
        // Declare variables before binding results
        $id = null;
        $hashedPassword = null;
        
        $stmt = $this->conn->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $data['first']);
        $stmt->execute();
        
        // Bind the result variables
        $stmt->bind_result($id, $hashedPassword);
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            //TODO:: check wh errors

            if (password_verify($data['password'], $hashedPassword)) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user_id'] = $id;
                $stmt->close();
                return true; // User logged in successfully
            } else {
                $stmt->close();
                return false; // Incorrect password
            }
        } else {
            $stmt->close();
            return false; // No user found with that username
        }
    }
    
 
    public function getUserById($user_id) {
        $stmt = $this->conn->prepare("SELECT id, username FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }
    
    // Log out function
    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION['user_id']);
        session_destroy();
        return true;
    }
    
    // Check if user is logged in
    public function isLoggedIn() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user_id']);
    }
}