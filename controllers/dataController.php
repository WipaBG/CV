<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("models/Data.php");

class dataController {
    private $conn;
    private $dataModel;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->dataModel = new Data($conn);
    }

    public function index() {
        // Fetch all data from the database
        $userData = $this->dataModel->getAll();
        
        // Close the database connection
        $this->conn->close();
        
        print_r($userData);
        // Extract individual data from $userData
        $education = $userData['education'] ?? 'No education data available';
        $skills = $userData['skills'] ?? 'No skills data available';
        $projects = $userData['projects'] ?? 'No project data available';
        $experience = $userData['experience'] ?? 'No experience data available';
        
        // Pass data to the view
        include("views/homeform.php");
    }
}
?>
