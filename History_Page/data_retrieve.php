<?php include ('data_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$datefrom = $_POST['value1'];
$dateto = $_POST['value2'];
$type = $_POST['value3'];
$groomer = $_POST['value4'];
$total = 0;
if ($type == 'groomer') {
    $result = $connect->query("SELECT * FROM `customer_details`,`spa_services`,`groomer_details` 
    WHERE `customer_details`.`Done?`='Yes' AND `customer_details`.`Owners_ID`=`spa_services`.`Owners_ID` AND `spa_services`.`Groomer`='$groomer' AND `groomer_details`.`Groomer_name`='$groomer';")
     or die($connect->error); 
?>
<table class="tg">
      <th>Date</th>
      <th>Total</th>
      <th>Commission</th>
    <?php
    $total = 0;
    while($row = $result->fetch_assoc()) {
        $date = new DateTime($row['App_Date']);
        $newdate = $date->format('Y-m-d');
        
        if ($datefrom<=$newdate && $dateto>=$newdate) {
            $commission = ($row['Spa_Total']/100)*$row['Commission'];
            $total += $commission;
        ?>
        <tr>
        <td> <?php echo $newdate; ?></td>
        <td> <?php echo $row['Spa_Total']; ?> </td>
        <td> <?php echo $commission; ?> </td>
        </tr>
<?php 
}}?> </table><br><br><p id="total"> Total: 
<?php echo $total ?> </p>
<?php }
else {
    $result = $connect->query("SELECT * FROM `customer_details`,`spa_services`
    WHERE `customer_details`.`Done?`='Yes' AND `customer_details`.`Owners_ID`=`spa_services`.`Owners_ID`")
     or die($connect->error); ?>
     <table class="tg">
      <th>Date</th>
      <th>Bath Type</th>
      <th>Add-on Services</th>
    <?php
    while($row = $result->fetch_assoc()) {
        $date = new DateTime($row['App_Date']);
        $newdate = $date->format('Y-m-d');
        
        if ($datefrom<=$newdate && $dateto>=$newdate) {
        ?>
        <tr>
        <td> <?php echo $newdate; ?></td>
        <td> <?php echo $row['Bath_Type']; ?> </td>
        <td> <?php echo $row['Add-on_Services']; ?> </td>
        </tr>
<?php 
}}?> </table>
<?php }
?>

</body>
</html>