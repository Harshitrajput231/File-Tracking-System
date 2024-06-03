<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "filelogin";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Die if connection was not successful
    if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{
    echo "Connection was successful<br>";
    }
    session_start();
    $whom = $_POST["whom"];
    $dispatch = $_POST["dispatch"];
    $description = $_POST["description"];
    $_SESSION["description"] = $_POST["description"];
    $_SESSION["whom"]=$_POST["whom"];
    $_SESSION["dispatch"]= $_POST["dispatch"];
    $usr = $_SESSION["username"];
    // echo $_SESSION["whom"];
    // echo $_SESSION["dispatch"];
    $conn->close();





    // Check if a file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "uploads/"; // Change this to the desired directory for uploaded files
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is allowed (you can modify this to allow specific file types)
        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($file_type, $allowed_types)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
        } else {
           



            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // File upload success, now store information in the database
                $filename = $_FILES["file"]["name"];
                // session_start();
                $_SESSION["mobile"]=$filename;

                $filesize = $_FILES["file"]["size"];
                $filetype = $_FILES["file"]["type"];
                // session_start();
                $_SESSION["filename"] = $filename ;

                // Database connection
                $db_host = "localhost";
                $db_user = "root";
                $db_pass = "";
                $db_name = "filelogin";

                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Insert the file information into the database
                $sql = "INSERT INTO files (filename, filesize, filetype) VALUES ('$filename', $filesize, '$filetype');
                        INSERT INTO `trackfile` ( `filename`, `from`, `to`,`dispatchno`,`description`) VALUES ('$filename', '$usr', '$whom','$dispatch','$description');
                        INSERT INTO `file_movement` ( `filename`,`description`, `from`, `to`) VALUES ('$filename','$description', '$usr', '$whom');
                        ";


                if ($conn->multi_query($sql) === TRUE) {
                    echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded and the information has been stored in the database.";
                    
                } else {
                    echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
                }

                $conn->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            /background-color: #f8f9fa;/
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f0f0;

            background-image: url("upload.jpg");
            background-size: cover; /* Adjust to fit the entire screen */
            background-repeat: no-repeat; /* Prevents the image from repeating */
            background-attachment: fixed; /* Keeps the background image fixed during scroll */
        }

       


        .btn-primary {
            color: #fff;
            padding: 15px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            
            background-color: rgba(0, 0, 255, 0.5); /* Semi-transparent blue */
            backdrop-filter: blur(10px); /* Apply blur effect */
            transition: background-color 0.3s ease; /* Smooth transition on hover */
        }

        .btn-primary:hover {
            background-color: rgba(0, 255, 0, 0.5); /* Change to semi-transparent green on hover */
        }

    h2{
        color:#fff;
        align:center;
        background-color: #f5bb27;
    }

    .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white */
            backdrop-filter: blur(10px); /* Apply blur effect */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%; /* Adjust width as needed */
            max-width: 400px; /* Ensure it doesn't get too wide */
        }
  
    </style>
</head>
    <body>
    <div class="container">
    <h2>Click here to upload more files</h2>
    <button onclick="location.href = 'http://localhost/college/sendfile.php';" class="btn-primary">Upload More Files</button>
    <button onclick="location.href = 'http://localhost/college/trackfile.php';" class="btn-primary">Track File</button>
    <button onclick="location.href = 'http://localhost/college/options.php';" class="btn-primary">Home</button>
</div>
<body>
</html>


