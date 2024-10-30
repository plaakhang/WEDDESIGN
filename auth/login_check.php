<?php
session_start();
require "../config/conn.php";

$uname = $_POST["uname"];
$upassword = $_POST["upassword"];

$query = "SELECT upassword, u_status, u_fname, u_lname FROM user WHERE uname = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $uname);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row["upassword"];
    $u_status = $row["u_status"];
    $u_fname = $row["u_fname"];
    $u_lname = $row["u_lname"];

    if (password_verify($upassword, $hashed_password)) {
        switch ($u_status){
            case "admin":
                $_SESSION['status'] = "admin";
                $_SESSION["fname_lname"] = $u_fname . " " . $u_lname;
                header("Location: ../page_admin.php");
                exit(0);
            case "user":
                $_SESSION['status'] = "user";
                $_SESSION["fname_lname"] = $u_fname . " " . $u_lname;
                header("Location: ../page_user.php");
                exit(0);
        }
    } else {
        header("Location: login.php?err=Invalid Username or Password");
    }
} else {
    header("Location: login.php?err=Invalid Username or Password");
}

mysqli_close($conn);