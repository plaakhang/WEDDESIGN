<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Insert</title>
    <style>
        /* General page styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Form styling */
        form {
            background-color: #fff;
            padding: 20px;
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Label styling */
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        /* Input field styling */
        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Button styling */
        input[type="submit"],
        input[type="reset"],
        input[type="button"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: #4CAF50;
        }

        input[type="reset"] {
            background-color: #f39c12;
        }

        input[type="button"] {
            background-color: #dc3545;
        }

        /* Hover effects for buttons */
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="reset"]:hover {
            background-color: #e67e22;
        }

        input[type="button"]:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>

    <form action="user_insert_save.php" method="POST">
        <label>ชื่อ: </label>
        <input type="text" name="u_fname" required><br>

        <label>นามสกุล: </label>
        <input type="text" name="u_lname" required><br>

        <label>ชื่อผู้ใช้งาน (UserName): </label>
        <input type="text" name="uname" required><br>

        <label>รหัสผ่าน (Password): </label>
        <input type="text" name="upassword" required><br>

        <label>สถานะ: </label>
        <select name="u_status" required>
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select><br><br>

        <input type="submit" name="submit" value="Save">
        <input type="reset" value="Clear">
        <input type="button" value="Back" onclick="history.back();">
    </form>

</body>

</html>
