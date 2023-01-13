<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lalunadatabase";
// Create connection
$connect = new mysqli($servername, $username, $password, $database);

if (isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $connect->query("DELETE FROM `groomer_details` WHERE Groomer_ID = '$id'") or die($connect->error);

    header("Location:admin_2.php"); 
}


$connect->close();
?>
