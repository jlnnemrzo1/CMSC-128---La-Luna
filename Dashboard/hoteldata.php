<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lalunadatabase";
// Create connection
$connect = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$colres = $connect->query("SELECT sum(Extra_Guests1 + Extra_Guests2) as total FROM hotel_services;") or die($connect->error);
$rowres1 =  $connect->query("SELECT COUNT(*) as total1 FROM hotel_services; ") or die($connect->error);

if( $rowres1 == NULL){
    $rowres = 0;
}else{
    $rowres = $rowres1;
}

$dycr2 = $connect->query("SELECT COUNT(*) as dycr_count FROM hotel_services_daycare;") or die($connect->error);

if( $dycr2 == NULL){
    $dycr = 0;
}else{
    $dycr = $dycr2;
}

$connect->close();
?>