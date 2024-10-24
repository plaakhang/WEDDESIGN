<?php
include "user_function.php";

$u_fname = $_POST["u_fname"];
$u_lname = $_POST["u_lname"];
$uname = $_POST["uname"];
$upassword = $_POST["upassword"];
$u_status = $_POST["u_status"];

user_insert_save($u_fname, $u_lname, $uname, $upassword, $u_status);

echo "บันทึกข้อมูลเรียบร้อย";
echo "<br>";
echo "<a href='user_show.php'><input type='button' value='BACK'></a>";
