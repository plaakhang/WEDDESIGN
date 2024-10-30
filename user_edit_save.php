<?php
include 'user_function.php';

$u_id = $_POST["u_id"];
$u_fname = $_POST["u_fname"];
$u_lname = $_POST["u_lname"];
$uname = $_POST["uname"];
$u_status = $_POST["u_status"];

user_edit_save($u_id, $u_fname, $u_lname, $uname, $u_status);

echo "บันทึกข้อมูล Update เรียบร้อย";
echo "<br>";
echo "<a href='user_show.php'><input type='button' value='BACK'></a>";