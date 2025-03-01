<?php

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
    public function createData($name, $education, $skills, $projects, $experience, $image) {
        $query = "INSERT INTO user_data (name, education, skills, projects, experience, Image) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        
        // Bind the values to the statement
        $stmt->bind_param("ssssss",$name, $education, $skills, $projects, $experience, $image);
        
        // Execute the query
        if ($stmt->execute()) {
            return true; // Successfully inserted data
        } else {
            return false; // Error inserting data
        }
    }
    
}
?>
