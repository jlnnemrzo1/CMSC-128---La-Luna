<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lalunadatabase";
// Create connection
$connect = new mysqli($servername, $username, $password, $database);

if (isset($_GET['ownerid'])){
    $id = $_GET['ownerid'];
    
    $connect->query("UPDATE `customer_details` SET `Paid`='Yes' WHERE `Owners_ID`= '$id'")
    or die($connect->error);
    header("Location:calendar.php"); 
}


$connect->close();
?>
