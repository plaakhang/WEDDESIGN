<?php
require "user_function.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Show</title>
</head>

<body>

    <h1>Student Data</h1>

    <div><a href="user_insert.php">เพิ่ม User</a></div><br>

    <table width="60%" border="1">
        <tr>
            <th>ลำดับ</th>
            <th>รหัส</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>Username</th>
            <th>Password</th>
            <th>สถานะ</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
        </tr>

        <?php
        $i = 1;
        $result = fetch_all();
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $i++ . "</td>";
            echo "<td>" . $row['u_id'] . "</td>";
            echo "<td>" . $row['u_fname'] . "</td>";
            echo "<td>" . $row['u_lname'] . "</td>";
            echo "<td>" . $row['uname'] . "</td>";
            echo "<td>" . $row['upassword'] . "</td>";
            echo "<td>" . $row['u_status'] . "</td>";

            echo "<td>";
            echo '<a href="user_edit.php?u_id=' . $row['u_id'] . '">Edit</a>';
            echo "</td>";

            echo "<td>";
            echo '<a href="user_del.php?u_id=' . $row['u_id'] . '" onclick="return confirm(\'Are you sure?\')">Delete</a>';
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </table>



</body>

</html>