<?php
require "user_function.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Show</title>
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        
        /* Table styling */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            background-color: #fff;
        }
        
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        
        th {
            background-color: #4CAF50;
            color: white;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        /* Button styling */
        a {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border-radius: 3px;
        }
        
        .btn-add {
            background-color: #28a745;
            display: inline-block;
            margin-bottom: 15px;
        }
        
        .btn-edit {
            background-color: #ffc107;
        }
        
        .btn-delete {
            background-color: #dc3545;
        }
        
        /* Hover effects */
        a:hover {
            opacity: 0.8;
        }
        
    </style>
</head>

<body>

    <h1>Student Data</h1>

    <div><a href="user_insert.php" class="btn-add">เพิ่ม User</a></div><br>

    <table>
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
            echo '<a href="user_edit.php?u_id=' . $row['u_id'] . '" class="btn-edit">Edit</a>';
            echo "</td>";

            echo "<td>";
            echo '<a href="user_del.php?u_id=' . $row['u_id'] . '" class="btn-delete" onclick="return confirm(\'Are you sure?\')">Delete</a>';
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </table>

</body>

</html>
