<?php
include 'conn.php'; // Include your connection file

// Check if the required POST variables are set
if (isset($_POST['emp_id'], $_POST['Fullname'], $_POST['Username'], $_POST['Department'], $_POST['Password'], $_POST['Type'])) {
    // Get the POST variables
    $emp_id = $_POST['emp_id'];
    $full_name = $_POST['Fullname'];
    $username = $_POST['Username'];
    $department = $_POST['Department'];
    $password = $_POST['Password'];
    $type = $_POST['Type'];

    // Prepare the SQL query to update the account
    $sql = "UPDATE [live_mrcs_db].[dbo].[account]
            SET full_name = ?, username = ?, department = ?, password = ?, type = ?
            WHERE emp_id = ?";
    $params = array($full_name, $username, $department, $password, $type, $emp_id);

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check for errors
    if ($stmt === false) {
        echo json_encode(array("status" => "error", "message" => sqlsrv_errors()));
    } else {
        echo json_encode(array("status" => "success", "message" => "Account updated successfully."));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Required fields are missing."));
}

// Close the connection
sqlsrv_close($conn);
?>
