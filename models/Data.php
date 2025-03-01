<?php

class Data{
    private $conn;


    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function getEducation() {
        $query = "SELECT * FROM data WHERE category = 'education' ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getSkills() {
        $query = "SELECT * FROM data WHERE category = 'skills' ORDER BY name ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function getProjects() {
        $query = "SELECT * FROM data WHERE category = 'projects' ORDER BY completion_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function getExperience() {
        $query = "SELECT * FROM data WHERE category = 'experience' ORDER BY start_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function getAll() {
        $result = [
            'education' => $this->getEducation(),
            'skills' => $this->getSkills(),
            'projects' => $this->getProjects(),
            'experience' => $this->getExperience()
        ];
        
        return $result;
    }


}



?>