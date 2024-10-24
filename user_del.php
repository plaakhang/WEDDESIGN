<?php
include 'user_function.php';

$u_id = $_GET['u_id'];

user_del($u_id);

echo "ลบข้อมูลเรียบร้อย";
echo "<br>";
echo "<a href='user_show.php'><input type='button' value='BACK'></a>";
