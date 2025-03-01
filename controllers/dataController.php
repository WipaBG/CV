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
        // Ensure the user is logged in (user_id should be in session)
        if (!isset($_SESSION['user_id'])) {
            // Redirect to login if user is not logged in
            header("Location: login.php");
            exit;
        }
    
        // Fetch user-specific data from the database using the user_id
        $user_id = $_SESSION['user_id']; // Get the user ID from session
        $userData = $this->dataModel->getByUserId($user_id);
    
        if ($userData) {
            // Extract individual data from $userData
            $name = $userData['name'] ?? 'No education data available';
            $education = $userData['education'] ?? 'No education data available';
            $skills = $userData['skills'] ?? 'No skills data available';
            $projects = $userData['projects'] ?? 'No project data available';
            $experience = $userData['experience'] ?? 'No experience data available';
            $image = $userData['image'] ?? 'No image data available';
    
            // Pass data to the view
            include("views/homeform.php");
        } else {
            // Handle case where no data is found for the user
            echo "No data found for the logged-in user.";
        }
    }
    

    // Method to handle creating new data
    public function create() {
        if(!isset($_SESSION['user_id'])){
            header("Location: login.php");
            exit;
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $education = $_POST['education'];
            $skills = $_POST['skill']; // Convert skills array to string
            $projects = $_POST['project'];
            $experience = isset($_POST['experience']) ? $_POST['experience'] : ''; // Default to an empty string if not set
            $user_id = $_SESSION['user_id'];
            $image = $_POST['image']; 
    
            // Insert the data into the database
            $isCreated = $this->dataModel->createData($name, $education, $skills, $projects, $experience, $image, $user_id);
            
            if ($isCreated) {
                header("Location: ./views/homeForm.php");

                echo "Data has been successfully saved!";
            } else {
                echo "There was an error saving the data.";
            }
        }
    
    
        include "views/create.php";
    }
    
}
?>
