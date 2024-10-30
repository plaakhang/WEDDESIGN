<?php

if (!isset($_GET['err'])) {
    $err = "";
} else {
    $err = $_GET["err"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: #007BFF;
            margin-bottom: 20px;
            text-align: center;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"],
        input[type="reset"] {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        input[type="reset"] {
            background-color: #ccc;
        }

        input[type="reset"]:hover {
            background-color: #bbb;
        }
    </style>
</head>

<body>
    <div>
        <h1>Login</h1>
        <div class="error"><?= $err ?></div>
        <form action="login_check.php" method="POST">
            <label>UserName:</label>
            <input type="text" name="uname" required>
            <label>Password:</label>
            <input type="password" name="upassword" required>
            <input type="submit" value="Login">
            <input type="reset" value="Clear">
        </form>
    </div>
</body>

</html>
