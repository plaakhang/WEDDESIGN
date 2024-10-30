<?php
session_start();

if(!isset($_SESSION['status']) or (!isset($_SESSION["status"]) !== 'user')){
    header("location: ./auth/login.php");
    exit(0);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER PAGE</title>
</head>
<body>
    <h1>WELCOME DUDE</1h>
    welcome dude <br>
    Musior <?=$_SESSION['fname_lname'] ?>
    <a href="./auth/logout.php">Logout</a>
</body>
</html>