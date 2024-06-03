<?php
require '_dbconnect.php';
session_start();
$un=$_SESSION["username"];


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
            background-image: url("optpics.jpg");
            background-size: cover; /* Adjust to fit the entire screen */
            background-repeat: no-repeat; /* Prevents the image from repeating */
            background-attachment: fixed; /* Keeps the background image fixed during scroll */
        }

        .button-container {
            text-align: center;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 15px 20px;
            margin: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    <title>File Management</title>
</head>
<body>
    <h1>Welcome <?php echo "$un" ?> to file tracking system</h1>
    <h3>select the options below</h3>
    <div class="button-container">
        <button  onclick="location.href = 'http://localhost/college/sendfile.php';" >SEND FILE</button>
        <button onclick="location.href = 'http://localhost/college/receive.php';" >RECEIVE FILE</button>
        <button onclick="location.href = 'http://localhost/college/trackfile.php';">TRACK FILE</button>
        <button onclick="location.href = 'http://localhost/college/chain.php';">TRACK FILE CHAIN</button>
    </div>
</body>
</html>
