<?php
session_start();
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

$fn = $_SESSION["filename"];
$usr = $_SESSION["username"];
$whom = $_SESSION["whom"];
$dispatch = $_SESSION["dispatch"];
$description = $_SESSION["description"];

// echo $_SESSION["whom"];
// echo $_SESSION["dispatch"];

// $sql = "INSERT INTO `trackfile` ( `filename`, `from`, `to`,`dispatchno`,`description`) VALUES ('$fn', '$usr', '$whom','$dispatch','$description')";
//         $result = mysqli_query($conn, $sql);
//         if($result){
// echo"table updated";


//         }else{
//             echo"error";
//         }
        $sql = "SELECT *FROM trackfile";
        
        $result = $conn->query($sql);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Track File</title>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

	<div class="container mt-5">
        <h2>Uploaded Files</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>from</th>
                    <th>to</th>
                    <th>Download</th>
                    <th>Date and time</th>
                    <th>Dispatch NO.</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display the uploaded files and download links
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $file_path = "uploads/" . $row['filename'];
                        ?>
                        <tr>
                            <td><?php echo $row['filename']; ?></td>
                            <td><?php echo $row['from']; ?> </td>
                            <td><?php echo $row['to']; ?></td>
                            <td><a href="<?php echo $file_path; ?>" class="btn btn-primary" download>Download</a></td>
                            <td><?php echo $row['uploadtime']; ?></td>
                            <td><?php echo $row['dispatchno']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4">No files uploaded yet.</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>


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
            background-image: url("trapic.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
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
    
</head>
<body>
    <div class="button-container">
        <button  onclick="location.href = 'http://localhost/college/options.php';" >HOME</button>
        <button onclick="location.href = 'http://localhost/college/chain.php';">TRACK FILE CHAIN</button>
        
    </div>
</body>
</html>





<?php
$conn->close();
?>