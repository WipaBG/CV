<?php

class Data {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll() {
        $query = "SELECT education, skills, projects, experience FROM user_data";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result(); // Fetch result
        return $result->fetch_assoc(); // Return as an associative array
    }

    // public function getSkills() {
    //     $query = "SELECT * FROM user_data WHERE category = 'skills' ORDER BY name ASC";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     return $result->fetch_all(MYSQLI_ASSOC);
    // }

    // public function getProjects() {
    //     $query = "SELECT * FROM user_data WHERE category = 'projects' ORDER BY completion_date DESC";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     return $result->fetch_all(MYSQLI_ASSOC);
    // }

    // public function getExperience() {
    //     $query = "SELECT * FROM user_data WHERE category = 'experience' ORDER BY start_date DESC";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     return $result->fetch_all(MYSQLI_ASSOC);
    // }

    // public function getAll() {
    //     return [
    //         'education' => $this->getEducation(),
    //         'skills' => $this->getSkills(),
    //         'projects' => $this->getProjects(),
    //         'experience' => $this->getExperience()
    //     ];
    // }
}



?>