<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileID = $_POST['fileID'];
    $status = $_POST['status'];

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
    $receiver_tables = ['csitreceive', 'ecreceive', 'eireceive', 'eereceive', 'mereceive', 'chreceive'];
    $sender_table_prefix = 'send';

    $updated = false;

    // Update the receiver table
    foreach ($receiver_tables as $table) {
        $stmt = $conn->prepare("UPDATE $table SET status = ? WHERE fileID = ?");
        $stmt->bind_param("ss", $status, $fileID);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Find the `from` column to determine the sender table
            $stmt_fetch = $conn->prepare("SELECT `from` FROM $table WHERE fileID = ?");
            $stmt_fetch->bind_param("s", $fileID);
            $stmt_fetch->execute();
            $result = $stmt_fetch->get_result();
            $row = $result->fetch_assoc();

            if ($row) {
                $sender_table = strtolower($row['from']) . $sender_table_prefix;

                // Update the sender table
                $stmt_update_sender = $conn->prepare("UPDATE $sender_table SET status = ? WHERE fileID = ?");
                $stmt_update_sender->bind_param("ss", $status, $fileID);
                $stmt_update_sender->execute();
                $stmt_update_sender->close();
            }
            $stmt_fetch->close();
            $updated = true;
            break;
        }

        $stmt->close();
    }

    $conn->close();

    if ($updated) {
        echo 'success';
    } else {
        echo 'failure';
    }
}
?>
