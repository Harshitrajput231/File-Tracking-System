<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "major";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Die if connection was not successful
    if (!$conn){
        die("<div style='background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 5px; margin: 10px 0;'>Sorry, we failed to connect: " . mysqli_connect_error() . "</div>");
    }
    else{
        echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px; margin: 10px 0;'>Connection was successful</div>";
    }
    session_start();
    $whom = $_POST["whom"];
    $dispatch = $_POST["dispatch"];
    $description = $_POST["description"];
    $_SESSION["description"] = $_POST["description"];
    $_SESSION["whom"]=$_POST["whom"];
    $_SESSION["dispatch"]= $_POST["dispatch"];
    $usr = $_SESSION["username"];
    $priority = $_POST["priority"];
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
                $db_name = "major";

                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Insert the file information into the database

                //for user CSIT
                if ($usr == "CSIT") 
                {
                    
                    $sql1 = "INSERT INTO csitsend (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    if ($conn->query($sql1) === TRUE) {
                        echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px; margin: 10px 0;'>The file <strong>" . basename($_FILES["file"]["name"]) . "</strong> has been uploaded and the information has been stored in the database.</div>";
                    } else {
                        echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
                    }
                
                if ($whom == "CSIT") {
                    $sql2 = "INSERT INTO csitreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql2);
                }
                if ($whom == "EC") {
                    $sql3 = "INSERT INTO ecreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql3);
                }
                if ($whom == "EI") {
                    $sql4 = "INSERT INTO eireceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql4);
                }
                if ($whom == "EE") {
                    $sql5 = "INSERT INTO eereceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql5);
                }
                if ($whom == "ME") {
                    $sql6 = "INSERT INTO mereceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql6);
                }
                if ($whom == "CH") {
                    $sql7 = "INSERT INTO chreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql7);
                }
                }

                // for user EC
                if ($usr == "EC") {
                    
                    $sql8 = "INSERT INTO ecsend (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    if ($conn->query($sql8) === TRUE) {
                        echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px; margin: 10px 0;'>The file <strong>" . basename($_FILES["file"]["name"]) . "</strong> has been uploaded and the information has been stored in the database.</div>";
                    } else {
                        echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
                    }
                
                if ($whom == "CSIT") {
                    $sql9 = "INSERT INTO csitreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql9);
                }
                if ($whom == "EC") {
                    $sql10 = "INSERT INTO ecreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql10);
                }
                if ($whom == "EI") {
                    $sql11 = "INSERT INTO eireceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql11);
                }
                if ($whom == "EE") {
                    $sql12 = "INSERT INTO eereceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql12);
                }
                if ($whom == "ME") {
                    $sql13 = "INSERT INTO mereceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql13);
                }
                if ($whom == "CH") {
                    $sql14 = "INSERT INTO chreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql14);
                }
            }
                // for user EI
                if ($usr == "EI") {
                    
                    $sql15 = "INSERT INTO eisend (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    if ($conn->query($sql15) === TRUE) {
                        echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px; margin: 10px 0;'>The file <strong>" . basename($_FILES["file"]["name"]) . "</strong> has been uploaded and the information has been stored in the database.</div>";
                    } else {
                        echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
                    }
                
                if ($whom == "CSIT") {
                    $sql16 = "INSERT INTO csitreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql16);
                }
                if ($whom == "EC") {
                    $sql17 = "INSERT INTO ecreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql17);
                }
                if ($whom == "EI") {
                    $sql18 = "INSERT INTO eireceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql18);
                }
                if ($whom == "EE") {
                    $sql19 = "INSERT INTO eereceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql19);
                }
                if ($whom == "ME") {
                    $sql20 = "INSERT INTO mereceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql20);
                }
                if ($whom == "CH") {
                    $sql21 = "INSERT INTO chreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql21);
                }
            }
                // for user EE
                if ($usr == "EE") {
                    
                    $sql22 = "INSERT INTO eesend (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    if ($conn->query($sql22) === TRUE) {
                        echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px; margin: 10px 0;'>The file <strong>" . basename($_FILES["file"]["name"]) . "</strong> has been uploaded and the information has been stored in the database.</div>";
                    } else {
                        echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
                    }
                
                if ($whom == "CSIT") {
                    $sql23 = "INSERT INTO csitreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql23);
                }
                if ($whom == "EC") {
                    $sql24 = "INSERT INTO ecreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql24);
                }
                if ($whom == "EI") {
                    $sql25 = "INSERT INTO eireceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql25);
                }
                if ($whom == "EE") {
                    $sql26 = "INSERT INTO eereceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql26);
                }
                if ($whom == "ME") {
                    $sql27 = "INSERT INTO mereceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql27);
                }
                if ($whom == "CH") {
                    $sql28 = "INSERT INTO chreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql28);
                }
            }
                // for user ME
                if ($usr == "ME") {
                    
                    $sql29 = "INSERT INTO mesend (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    if ($conn->query($sql29) === TRUE) {
                        echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px; margin: 10px 0;'>The file <strong>" . basename($_FILES["file"]["name"]) . "</strong> has been uploaded and the information has been stored in the database.</div>";
                    } else {
                        echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
                    }
                
                if ($whom == "CSIT") {
                    $sql30 = "INSERT INTO csitreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql30);
                }
                if ($whom == "EC") {
                    $sql31 = "INSERT INTO ecreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql31);
                }
                if ($whom == "EI") {
                    $sql32 = "INSERT INTO eireceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql32);
                }
                if ($whom == "EE") {
                    $sql33 = "INSERT INTO eereceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql33);
                }
                if ($whom == "ME") {
                    $sql34 = "INSERT INTO mereceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql34);
                }
                if ($whom == "CH") {
                    $sql35 = "INSERT INTO chreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql35);
                }
            }
                // for user CH
                if ($usr == "CH") {
                    
                    $sql36 = "INSERT INTO chsend (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    if ($conn->query($sql36) === TRUE) {
                        echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px; margin: 10px 0;'>The file <strong>" . basename($_FILES["file"]["name"]) . "</strong> has been uploaded and the information has been stored in the database.</div>";
                    } else {
                        echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
                    }
                
                if ($whom == "CSIT") {
                    $sql37 = "INSERT INTO csitreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql37);
                }
                if ($whom == "EC") {
                    $sql38 = "INSERT INTO ecreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql38);
                }
                if ($whom == "EI") {
                    $sql39 = "INSERT INTO eireceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql39);
                }
                if ($whom == "EE") {
                    $sql40 = "INSERT INTO eereceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql40);
                }
                if ($whom == "ME") {
                    $sql41 = "INSERT INTO mereceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql41);
                }
                if ($whom == "CH") {
                    $sql42 = "INSERT INTO chreceive (`filename`, filesize, filetype,`description`,`from`,`to`,fileID,`priority`) VALUES ('$filename', $filesize, '$filetype','$description','$usr','$whom','$dispatch','$priority');";
                    $conn->query($sql42);
                }
            }











                        //INSERT INTO `trackfile` ( `filename`, `from`, `to`,`dispatchno`,`description`) VALUES ('$filename', '$usr', '$whom','$dispatch','$description');
                        //INSERT INTO `file_movement` ( `filename`,`description`, `from`, `to`) VALUES ('$filename','$description', '$usr', '$whom');
                        //";

                //                if ($conn->multi_query($sql) === TRUE) {

                // if ($conn->query($sql1) === TRUE) {
                //     echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded and the information has been stored in the database.";
                // } else {
                //     echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
                // }
                

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


