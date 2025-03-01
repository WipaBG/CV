<?php
class User {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function register($data) {
        // Validate that username exists in the data
        if (!isset($data['username']) || empty($data['username'])) {
            return false; // Username is required
        }
        
        // Check if username already exists
        $checkStmt = $this->conn->prepare("SELECT id FROM users WHERE username = ?");
        $checkStmt->bind_param("s", $data['username']);
        $checkStmt->execute();
        $checkStmt->store_result();
        
        if ($checkStmt->num_rows > 0) {
            $checkStmt->close();
            return false; // Username already exists
        }
        $checkStmt->close();
        
        // Hash the password
        $password = $data['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert new user with username (not email)
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
        if (!isset($data['username']) || !isset($data['password'])) {
            return false;
        }
        
        $stmt = $this->conn->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $data['username']);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            //TODO:
            $stmt->bind_result($user_id, $hashedPassword);
            $stmt->fetch();
            
            // Check if the password matches
            if (password_verify($data['password'], $hashedPassword)) {
                // Start session if not already started
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user_id'] = $user_id;
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
    
    // Optional: Get user details by ID
    public function getUserById($user_id) {
        $stmt = $this->conn->prepare("SELECT id, username FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }
    
    // Optional: Log out function
    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION['user_id']);
        session_destroy();
        return true;
    }
}
?>