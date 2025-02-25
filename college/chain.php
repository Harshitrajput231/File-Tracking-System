<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "major";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

$filename = $_SESSION["filename"];
$from = $_SESSION["username"];
$to = $_SESSION["whom"];
$dispatch = $_SESSION["dispatch"];
$description = $_SESSION["description"];
$fileID = $_SESSION["fileID"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>File Chain Structure</title>
    <style>
        /* General styles */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #333;
            background-image: url("chpic.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        section {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            width: 80%;
            max-width: 600px;
        }

        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li.chain-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .chain-details {
            background-color: #f9f9f9;
            border: 1px solid #eee;
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            flex: 1;
        }

        .chain-arrow {
            margin-left: 10px;
            font-size: 24px;
            color: #007bff;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .button-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>File Chain Structure</h1>
    </header>

    <section id="file-chain">
        <h2>File Tracking Chain</h2>
        <ul id="chain-list">
            <?php
            include '_dbconnect.php';

            // Array to store all the queries
            $queries = [
                "SELECT * FROM csitsend WHERE fileID=$fileID",
                //"SELECT * FROM csitreceive WHERE fileID=$fileID",
                "SELECT * FROM ecsend WHERE fileID=$fileID",
                //"SELECT * FROM ecreceive WHERE fileID=$fileID",
                "SELECT * FROM eisend WHERE fileID=$fileID",
                //"SELECT * FROM eireceive WHERE fileID=$fileID",
                "SELECT * FROM eesend WHERE fileID=$fileID",
                //"SELECT * FROM eereceive WHERE fileID=$fileID",
                "SELECT * FROM mesend WHERE fileID=$fileID",
                //"SELECT * FROM mereceive WHERE fileID=$fileID",
                "SELECT * FROM chsend WHERE fileID=$fileID",
                //"SELECT * FROM chreceive WHERE fileID=$fileID"
            ];

            $results_found = false;

            // Loop through each query
            foreach ($queries as $sql) {
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $results_found = true;

                    // Fetch each row and display the data
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<li class='chain-item'>";
                        echo "<div class='chain-details'>";
                        echo "<strong>Description:</strong> " . htmlspecialchars($row['description']) . "<br>";
                        echo "<strong>From:</strong> " . htmlspecialchars($row['from']) . "<br>";
                        echo "<strong>To:</strong> " . htmlspecialchars($row['to']) . "<br>";
                        echo "<strong>Move Time:</strong> " . htmlspecialchars($row['upload_date']) . "<br>";
                        echo "</div>";
                        echo "<div class='chain-arrow'>→</div>";
                        echo "</li>";
                    }
                }
            }

            if (!$results_found) {
                echo "No movements found for this file.";
            }

            mysqli_close($conn);
            ?>
        </ul>
        <div class="button-container">
            <button onclick="location.href = 'http://localhost/college/options.php';">HOME</button>
        </div>
    </section>
</body>
</html>
