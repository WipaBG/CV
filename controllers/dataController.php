<?php
require_once("../models/Data.php");

class dataController{
    private $conn;
    private $dataModel;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->dataModel = new Data($conn);  

    }

    public function index(){
        $education = $this->dataModel->getEducation();
        $skills = $this->dataModel->getSkills();
        $projects = $this->dataModel->getProjects();
        $experience = $this->dataModel->getExperience();
        //TODO: add path
        include("views/");
    }


}

?>