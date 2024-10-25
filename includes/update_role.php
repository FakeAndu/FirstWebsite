<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsystem";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
session_start();
if (!$conn){
    die("Connection failed" . mysqli_connect_error());
}
$usersId = $_SESSION["usersId"];
$roleAs = 1;
$sql = "UPDATE users SET roleAs='$roleAs' WHERE usersId='$usersId'";
if (mysqli_query($conn, $sql)) {
    echo "User role updated successfully,";
}
else {
    echo "Error updating user role: " . mysqli_error($conn);
}
mysqli_close($conn);
?>