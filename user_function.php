<?php

require "config/conn.php";

// Query all data
function fetch_all()
{
    global $conn;

    // SQL Statement
    $query = "SELECT * FROM user ORDER BY u_id";

    // Check SQL Statement and Prepare
    $stmt = mysqli_prepare($conn, $query);

    // Excecute SQL Statement
    mysqli_stmt_execute($stmt);

    // Get Result
    $result = mysqli_stmt_get_result($stmt);

    // Return Result
    return $result;
}

function user_insert_save($u_fname, $u_lname, $uname, $upassword, $u_status)
{
    global $conn;

    $hashed_password = password_hash($upassword, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (u_fname, u_lname, uname, upassword, u_status) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $u_fname, $u_lname, $uname, $hashed_password, $u_status);
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

function fetch_by_id($u_id)
{
    global $conn;

    $query = "SELECT * FROM user WHERE u_id LIKE '$u_id'";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return $result;
}

function user_edit_save($u_id, $u_fname, $u_lname, $uname, $u_status)
{
    global $conn;

    $query = "UPDATE 
                    user 
                SET 
                    u_fname = ?, u_lname = ?, uname = ?, u_status = ? 
                WHERE 
                    u_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $u_fname, $u_lname, $uname, $u_status, $u_id); // "ss" represents string, string
    mysqli_stmt_execute($stmt);
}

function user_reset_password($u_id)
{
    global $conn;
    $default_password = "123";

    $hashed_password = password_hash($default_password, PASSWORD_DEFAULT);

    $query = "UPDATE user SET upassword = ? WHERE u_id LIKE ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $u_id);
    mysqli_stmt_execute($stmt);
}