<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lalunadatabase";
// Create connection
$connect = new mysqli($servername, $username, $password, $database);

if (isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $connect->query("DELETE FROM `customer_details` WHERE Owners_ID = '$id'") or die($connect->error);
    $connect->query("DELETE FROM `hotel_services` WHERE Owners_ID = '$id'") or die($connect->error);
    $connect->query("DELETE FROM `hotel_services_daycare` WHERE Owners_ID = '$id'") or die($connect->error);
    $connect->query("DELETE FROM `spa_services` WHERE Owners_ID = '$id'") or die($connect->error);
    header("Location:calendar.php"); 
}


$connect->close();
?>
