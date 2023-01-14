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

$todaydate = date("Y-m-d");
$colres = $connect->query("SELECT sum(Extra_Guests1 + Extra_Guests2) as total FROM hotel_services WHERE (Date(Check_Out_Date) > '$todaydate' AND `Done?` != 'Yes') OR (Date(Check_Out_Date) < '$todaydate' AND `Done?` != 'Yes')") or die($connect->error);
$rowres1 =  $connect->query("SELECT COUNT(*) as total1 FROM hotel_services WHERE Date(Check_Out_Date) > '$todaydate' AND `Done?` != 'Yes' OR (Date(Check_Out_Date) < '$todaydate' AND `Done?` != 'Yes')")  or die($connect->error);

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


$result = $connect->query("SELECT * FROM `hotel_services`,`customer_details` WHERE `hotel_services`.`Owners_ID`= `customer_details`.`Owners_ID` AND cast(App_Date AS date) = CURDATE() AND `hotel_services`.`Done?` != 'Yes'") or die($connect->error);
$result1 = $connect->query("SELECT * FROM `hotel_services_daycare`,`customer_details` WHERE `hotel_services_daycare`.`Owners_ID`= `customer_details`.`Owners_ID`AND cast(App_Date AS date) = CURDATE() AND `hotel_services_daycare`.`Done?` != 'Yes'") or die($connect->error);
$connect->close();
?>