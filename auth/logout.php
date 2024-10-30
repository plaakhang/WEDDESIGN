<?php
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
        // echo "Login Successful";

        switch ($u_status) {
            case "admin":
                header("location: ../page_admin.php");
                break;
            case "user":
                header("location: ../page_user.php");
                break;
        }
    } else {
        // echo "Invalid username or password.";
        header("location: login.php?err=Invalid UserName or Password");
    }
} else {
    // echo "UserName not found";
    echo "Invalid username or password.";
    header("location: login.php?err=Invalid UserName or Password");
}

mysqli_close($conn);