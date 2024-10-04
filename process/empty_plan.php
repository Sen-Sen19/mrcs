<?php
// Include the connection file
include 'conn.php';

// SQL query to delete all records from the table and get the number of rows affected
$sql = "DELETE FROM [live_mrcs_db].[dbo].[plan_from_pc]";
$stmt = sqlsrv_query($conn, $sql);

// Check if the query was successful
if ($stmt === false) {
    // Return error message as JSON
    echo json_encode(array("status" => "error", "message" => "Database query failed: " . print_r(sqlsrv_errors(), true)));
    exit; // Stop further execution
}

// Get the number of rows affected
$rowsAffected = sqlsrv_rows_affected($stmt);

// Prepare the response
if ($rowsAffected === false) {
    echo json_encode(array("status" => "error", "message" => "Error in retrieving number of deleted rows."));
} else {
    echo json_encode(array("status" => "success", "message" => $rowsAffected . " rows have been deleted."));
}

// Close the connection
sqlsrv_close($conn);
?>
