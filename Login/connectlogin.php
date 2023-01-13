<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "lalunadatabase";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM `login_details`") or die($conn->error);
while($row = $result->fetch_assoc()){
    $username = $row["username"];
    $pass = $row["password"];
}

$login_username = $login_pass = "";
$error = "username/password incorrect";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login_username = $_POST['username'];
    $login_pass = $_POST['password'];

    if (($login_username == $username) && ($login_pass == $pass)){
        header("Location: ../Dashboard/Dashboard.php");
        }
        else {
            $_SESSION["error"] = $error;
            die(header("location:login.php?loginFailed=true&reason=password"));
        }

}

$conn->close();
?>