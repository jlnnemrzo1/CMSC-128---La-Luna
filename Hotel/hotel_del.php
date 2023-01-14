<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lalunadatabase";
// Create connection
$connect = new mysqli($servername, $username, $password, $database);

if (isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $connect->query("UPDATE `hotel_services_daycare`  SET `Done?`='Yes' WHERE `Owners_ID`= '$id'")or die($connect->error);
}

else if (isset($_GET['hoteldelid'])){
    $id = $_GET['hoteldelid'];
    $connect->query("UPDATE `hotel_services` SET `Done?`='Yes' WHERE `Owners_ID`= '$id'")or die($connect->error);
}

header("Location: hotel.php"); 
$connect->close();
?>
