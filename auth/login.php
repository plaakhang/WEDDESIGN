<?php

if(!isset($_GET['err'])){
    $err = "";
}else{
    $err = $_GET["err"];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
</head>
<body>
    <h1>LOGIN</h1>
    <div>
        <h4 style="color:red"><? =$err ?></h4;>
    </div>
    <form action="login_check.php" method="POST">
        <label>Username: </label>
        <input type="text" name="uname"><br>
        <label>Password:</label>
        <input type="password" name="upassword">
        <br><br>
        <input type="submit" value="Login">
        <input type="reset" value="clear">
    </form>
</body>

</html>