<?php

class User{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function register($data){
        $password = $data['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $this->conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $data['email'], $hashedPassword);

        if ($stmt->execute()) {
            $user_id = $stmt->insert_id;
            
            $_SESSION['user_id'] = $user_id;  // Store the user_id in session
        } else {
            die("Error: " . $stmt->error);
        }

        $stmt->close();
    }

    // public function login($data){
    //     $stmt = $this->conn->prepare("SELECT id, password FROM users WHERE email = ?");
    //     $stmt->bind_param("s", $data['email']);
    //     $stmt->execute();
    //     $stmt->store_result();

    //     if ($stmt->num_rows > 0) {
    //         $stmt->bind_result($user_id, $hashedPassword);
    //         $stmt->fetch();

    //         // Check if the password matches
    //         if (password_verify($data['password'], $hashedPassword)) {
    //             $_SESSION['user_id'] = $user_id;
    //             return true;  // User logged in successfully
    //         } else {
    //             return false; // Incorrect password
    //         }
    //     } else {
    //         return false; // No user found with that email
    //     }

    //     $stmt->close();
    // }
}

?>
