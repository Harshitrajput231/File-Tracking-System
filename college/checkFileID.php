<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileID = $_POST['fileID'];

    // Database connection
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "major";

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Tables to check
    $tables = ['csitsend', 'eisend', 'eesend', 'chsend', 'mesend', 'ecsend'];
    $exists = false;

    // Check each table for the File ID
    foreach ($tables as $table) {
        $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM $table WHERE fileID = ?");
        $stmt->bind_param("s", $fileID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['count'] > 0) {
            $exists = true;
            break;
        }

        $stmt->close();
    }

    $conn->close();

    // Respond with the result
    echo $exists ? 'exists' : 'available';
}
?>
