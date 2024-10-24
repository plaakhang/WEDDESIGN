<?php
require "database.php";

// Connect Database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check Connection
if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
} else {
    // echo "Connection Successful!";
}

?>