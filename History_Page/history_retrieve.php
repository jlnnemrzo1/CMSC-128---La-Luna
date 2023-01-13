<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lalunadatabase";
// Create connection
$connect = new mysqli($servername, $username, $password, $database);

$result = $connect->query("SELECT * FROM `groomer_details` WHERE 1")
or die($connect->error);

$connect->close();
?>
