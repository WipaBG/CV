<?php
session_start(); // Start the session

class Data {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Fetch all data from the database
    public function getAll() {
        $query = "SELECT name, education, skills, projects, experience, Image FROM user_data";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // Return as an associative array
    }

    // Create a new entry in the database
    public function createData($name, $education, $skills, $projects, $experience, $image, $user_id) {
        $query = "INSERT INTO user_data (name, education, skills, projects, experience, Image, user_id) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        
        // Bind the values to the statement
        $stmt->bind_param("sssssss",$name, $education, $skills, $projects, $experience, $image, $user_id);
        
        // Execute the query
        if ($stmt->execute()) {
            return true; // Successfully inserted data
        } else {
            return false; // Error inserting data
        }
    }

    public function getByUserId($user_id) {
        $sql = "SELECT * FROM data WHERE user_id = $user_id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam('user_id', $user_id);
        $stmt->execute();
        
        // Fetch the data for the logged-in user
        return $stmt->fetch_assoc();
    }
    
    
}
?>
