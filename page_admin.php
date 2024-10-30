<?php
session_start();

if(!isset($_SESSION['status']) or (!isset($_SESSION["status"]) !== 'admin')){
    header("location: ./auth/login.php");
    exit(0);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>
</head>
<body>
    <h1>ADMIN!!!!!!</1h>
    welcome dude <br>
    Musior <?=$_SESSION['fname_lname'] ?>
    <a href="./auth/logout.php">Logout</a>
</body>
</html>