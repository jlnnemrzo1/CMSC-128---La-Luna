<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "lalunadatabase";
// Create connection
$connect = new mysqli($servername, $username, $password, $database);

    if (!empty($_POST['updatedatalogin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "UPDATE `login_details` SET `username`='$username', `password`='$password' WHERE 1";
        $query_run = mysqli_query($connect, $query);
        
        header("Location:admin_2.php");
    }
    
    else if (!empty($_POST['updatedatagroomer'])) {
        $c = uniqid (rand (),true);
        $md5c = md5($c);
        $groomer_id = $md5c;
        echo ("happy");
        $groomer = $_POST['groomer'];
        $commission = $_POST['commission'];
        
        $connect->query("INSERT INTO `groomer_details`(`Groomer_ID`,`Groomer_name`, `Commission`) VALUES ('$groomer_id','$groomer','$commission')")
        or die($connect->error);
        
        header("Location:admin_2.php");
    }
    
?>