<?php
//database connection details
session_start();
$usr = $_SESSION["username"];

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "major";

 $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


 if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

 //Fetch the uploaded files from the database
if($usr == "CSIT"){
    $sql = "SELECT *FROM csitreceive";
    
}
if($usr == "EC"){
    $sql = "SELECT *FROM ecreceive";
    
}
if($usr == "EI"){
    $sql = "SELECT *FROM eireceive";
    
}
if($usr == "EE"){
    $sql = "SELECT *FROM eereceive";
    
}
if($usr == "ME"){
    $sql = "SELECT *FROM mereceive";
    
}
if($usr == "CH"){
    $sql = "SELECT *FROM chreceive";
    
}
 $result = $conn->query($sql);
 


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Uploaded files</title>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

	<div class="container mt-5">
        <h2>Reveived Files</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>File Size</th>
                    <th>File Type</th>
                    <th>Download</th>
                    <th>Date & Time</th>
                    <th>File ID</th>
                    <th>From</th>
                    <th>Priority</th> <!-- New Addition -->
                    <th>Status</th> <!-- New Column -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Display the uploaded files and download links
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $file_path = "uploads/" . $row['filename'];
                        $priority_class = strtolower($row['priority']); // Get the priority (High, Medium, Low)
                        // echo $priority_class;
                        $current_status = $row['status']; // Fetch current status
                        ?>
                        <tr>
                            <td><?php echo $row['filename']; ?></td>
                            <td><?php echo $row['filesize']; ?> bytes</td>
                            <td><?php echo $row['filetype']; ?></td>
                            <td><a href="<?php echo $file_path; ?>" class="btn btn-primary" download>Download</a></td>
                            <td><?php echo $row['upload_date']; ?></td>
                            <td><?php echo $row['fileID']; ?></td>
                            <td><?php echo $row['from']; ?></td>
                            <td class="<?php echo $priority_class; ?>"><?php echo $row['priority']; ?></td> <!-- New Addition -->

                            <td>
                                <!-- Status Buttons -->
                                <button class="btn btn-success" onclick="updateStatus('<?php echo $row['fileID']; ?>', 'Accepted')">Accept</button>
                                <button class="btn btn-danger" onclick="updateStatus('<?php echo $row['fileID']; ?>', 'Rejected')">Reject</button>
                                <br>
                                <small id="status_<?php echo $row['fileID']; ?>"><?php echo ucfirst($row['status']); ?></small> <!-- Display Current Status -->
                            </td>
                            
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="9">No files uploaded yet.</td>
                    </tr>
                    <?php
                }
                ?>
                <?php
                    // Re-execute the query before fetching rows
                        $result = $conn->query($sql);
                     // Add: Update seen_status in the corresponding sender table
                     if ($result->num_rows > 0) {
                        // echo "Rows found: {$result->num_rows}<br>";
                        while ($row = $result->fetch_assoc()) {
                            // echo "Row Data: ";
                            // print_r($row); // Debugging output
                            // echo "<br>";
                    
                            $file_id = $row['fileID'];
                            $from_column = $row['from']; // Ensure this column exists and has data
                    
                            // echo "File ID: $file_id, From Column: $from_column<br>";
                    
                            $sender_table = strtolower($from_column) . "send";
                            // echo "Sender Table: $sender_table<br>";
                    
                            $update_sql = "UPDATE $sender_table SET seen_status = TRUE WHERE fileID = ?";
                            // echo "SQL Query: $update_sql<br>";
                    
                            $stmt = $conn->prepare($update_sql);
                            if ($stmt) {
                                $stmt->bind_param("s", $file_id);
                                $stmt->execute();
                                // echo "Updated successfully for File ID: $file_id<br>";
                                $stmt->close();
                            } else {
                                // echo "Failed to prepare statement<br>";
                            }
                        }
                    } else {
                        // echo "No rows found in the receiver table<br>";
                    }
                    
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function updateStatus(fileID, status) {
            const statusElement = document.getElementById(`status_${fileID}`);

            // Send AJAX request to update the status
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'updateStatus.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    if (xhr.responseText === 'success') {
                        statusElement.textContent = status;
                    } else {
                        alert('Failed to update status. Please try again.');
                    }
                }
            };
            xhr.send('fileID=' + encodeURIComponent(fileID) + '&status=' + encodeURIComponent(status));
        }
    </script>

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
            background-image: url("recpic.jpg");
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

    <!-- FOR PRIORITY COLOUR -->
    <style>
    .high {
    background-color: #f8d7da !important;
    color: red !important;
}
.medium {
    background-color: #fff3cd !important;
    color: orange !important;
}
.low {
    background-color: #d4edda !important;
    color: green !important;
}

</style>

    
</head>
<body>
    <div class="button-container">
        <button  onclick="location.href = 'http://localhost/college/options.php';" >HOME</button>
        <button onclick="location.href = 'http://localhost/college/fileID.php';">TRACK FILE CHAIN</button>
        
    </div>
</body>
</html>


<?php
$conn->close();
?>