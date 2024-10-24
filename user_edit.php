<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Edit</title>
</head>

<body>

    <form action="user_insert_save.php" method="POST">
        <label>ชื่อ: </label>
        <input type="text" name="u_fname"><br>
        <label>นามสกุล: </label>
        <input type="text" name="u_lname"><br>
        <label>ชื่อผู้ใช้งาน (UserName): </label>
        <input type="text" name="uname"><br>
        <label>รหัสผ่าน (Password): </label>
        <input type="text" name="upassword"><br>
        <label>สถานะ: </label>

        <select name="u_status">
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select><br><br>

        <input type="submit" name="submit" value="Save">
        <input type="reset" value="Clear">
        <input type="button" value="Back" onclick="history.back();">
    </form>

</body>

</html>