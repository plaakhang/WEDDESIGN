<?php
session_start();
require "config/conn.php"; // เชื่อมต่อฐานข้อมูล

// ตรวจสอบสถานะการเข้าสู่ระบบและสิทธิ์
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: auth/login.php");
    exit();
}

// ตรวจสอบสถานะของผู้ใช้ หากไม่ใช่ผู้ดูแลระบบ ห้ามลบข้อมูล
$user_role = $_SESSION['status'];
$is_admin = ($user_role === 'admin');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restricted Data Access</title>
    <style>
        /* Styling as needed */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
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
        .btn-edit, .btn-save {
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
        }
        .btn-edit {
            background-color: #ffc107;
        }
    </style>
</head>
<body>
    <h1>Data Access (Restricted)</h1>
    <table>
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>แก้ไข</th>
            <th><?php if ($is_admin) echo "ลบ"; ?></th>
        </tr>

        <?php
        // ดึงข้อมูลทั้งหมดจากฐานข้อมูล
        $i = 1;
        $result = fetch_all(); // ฟังก์ชันดึงข้อมูล
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $i++ . "</td>";
            echo "<td>" . $row['u_fname'] . "</td>";
            echo "<td>" . $row['u_lname'] . "</td>";

            // ลิงก์แก้ไขข้อมูล
            echo "<td><a href='user_edit.php?u_id=" . $row['u_id'] . "' class='btn-edit'>Edit</a></td>";

            // ลิงก์ลบข้อมูล (แสดงเฉพาะผู้ดูแลระบบ)
            if ($is_admin) {
                echo "<td><a href='user_del.php?u_id=" . $row['u_id'] . "' class='btn-delete' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
            } else {
                echo "<td>ไม่อนุญาต</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
