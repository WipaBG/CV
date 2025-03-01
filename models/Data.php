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

    
}



?>