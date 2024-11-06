<?php

include 'conn.php';

if (isset($_POST['username']) && isset($_POST['newPassword']) && isset($_POST['full_name']) && isset($_POST['department']) && isset($_POST['type'])) {
    $username = $_POST['username'];
    $newPassword = $_POST['newPassword'];
    $fullName = $_POST['full_name'];
    $department = $_POST['department'];
    $type = $_POST['type'];

    if ($username !== 'admin') {
        // Prepare the SQL query to update all relevant fields
        $sql = "UPDATE account SET password = ?, full_name = ?, department = ?, type = ? WHERE username = ?";

        // Prepare the parameters for the query
        $params = array($newPassword, $fullName, $department, $type, $username);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            // Handle SQL error
            $error_message = print_r(sqlsrv_errors(), true);
            http_response_code(500); 
            echo "Failed to update account. SQL Error: " . $error_message;
        } else {
            // Successful update message
            echo "Account updated successfully!";
        }
    } else {
        // Deny permission for admin account
        http_response_code(403); 
        echo "Error: You do not have permission to change the admin account.";
    }

    sqlsrv_close($conn); 
} else {
    // Missing required POST data
    http_response_code(400); 
    echo "Error: Missing POST data.";
}
?>
