<?php

require '_dbconnect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    session_start();
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
        $un=$_POST["username"];
        $pwd=$_POST["password"];
        

    $sql = "SELECT `name` FROM `users` WHERE `name` = '".$_SESSION['username']."' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $sql1 = "SELECT `name` FROM `users` WHERE `password` = '".$_SESSION['password']."' ";
    $result = mysqli_query($conn, $sql);
    $num1 = mysqli_num_rows($result);
    // echo $num;
    if($num and $num1){
    //   echo "inside result loop";
      header('Location:http://localhost/college/options.php');
    }else{
        echo"Incorrect username or password";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    <title>Login Page</title>
</head>
<body>
    <h1>Login to the file tracking system</h1>
    <div class="login-container">
        <form action="process-login.php" method="POST">
            <h2>Login</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
