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

    // Index method to display user data
    public function index() {
        // Fetch all data from the database
        $userData = $this->dataModel->getAll();
        
        // Close the database connection
        $this->conn->close();

        // Extract individual data from $userData
        $name = $userData['name'] ?? 'No education data available';
        $education = $userData['education'] ?? 'No education data available';
        $skills = $userData['skills'] ?? 'No skills data available';
        $projects = $userData['projects'] ?? 'No project data available';
        $experience = $userData['experience'] ?? 'No experience data available';
        $image = $userData['Image'] ?? 'No image data available';

        // Pass data to the view
        include("views/homeform.php");
    }

    // Method to handle creating new data
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            print_r($_POST);
            $education = $_POST['education'];
            $skills = $_POST['skill']; // Convert skills array to string
            $projects = $_POST['project'];
            $experience = isset($_POST['experience']) ? $_POST['experience'] : ''; // Default to an empty string if not set

            $image = $_POST['image']; 
    
            // Insert the data into the database
            $isCreated = $this->dataModel->createData($education, $skills, $projects, $experience, $image);
            
            if ($isCreated) {
                echo "Data has been successfully saved!";
            } else {
                echo "There was an error saving the data.";
            }
        }
    
    
        include "views/create.php";
    }
    
}
?>
