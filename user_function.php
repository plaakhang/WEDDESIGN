<?php

require "config/conn.php";

function fetch_all()
{
    global $conn;
    
    $query = "SELECT * FROM user ORDER BY u_id";
    
    $stmt = mysqli_prepare($conn, $query);
   
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    return $result;
}

function user_insert_save($u_id, $u_fname, $u_lname, $uname, $u_status)
{

    global $conn;

    $query = "INSERT INTO user (u_id, u_fname, u_lname, uname, u_status) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $u_id, $u_fname, $u_lname, $uname,  $u_status);
    mysqli_stmt_execute($stmt);
}

function user_del($u_id)
{

    global $conn;

    $query = "DELETE FROM user WHERE u_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $u_id);
    mysqli_stmt_execute($stmt);
}
