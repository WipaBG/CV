
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "CV";

$conn = new mysqli($servername,$username,$password,$dbName);
if($conn->connect_error){
    die("Connection failed: " . $conn->error);
}




?>
