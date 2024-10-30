<?php
session_start();
require "../config/conn.php";

$uname = $_POST["uname"];
$upassword = $_POST["upassword"];

$query = "SELECT upassword, u_status FROM user WHERE uname = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $uname);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row["upassword"];
    $u_status = $row["u_status"];

    if (password_verify($upassword, $hashed_password)) {
        //echo "Login successful";

        switch ($u_status){
            case "admin":
                $_SESSION['status'] = "admin";
                $_SESSION["fname_lname"] = $u_fname . " " . $u_lname.
                header("location: ../page_admin.php");
                exit(0);
                break;
            case "user":
                $_SESSION['status'] = "user";
                $_SESSION["fname_lname"] = $u_fname . " " . $u_lname.
                header("location ../page_user.php");
                exit(0);
                break;

        }
    } else {
        header("location: login.php?err=Invalid Username or Password");
    }
} else {
    echo "Invalid Username or Password";
    header("location: login.php?err=Invalid Username or Password");
}

mysqli_close($conn);
