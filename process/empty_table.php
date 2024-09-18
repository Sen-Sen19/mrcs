<?php
// Include the connection file
include 'conn.php';

// SQL query to delete all records from the table and get the number of rows affected
$sql = "DELETE FROM [live_mrcs_db].[dbo].[plan_from_pc]";
$stmt = sqlsrv_query($conn, $sql);

// Check if the query was successful
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Get the number of rows affected
$rowsAffected = sqlsrv_rows_affected($stmt);

// Return the number of deleted rows
if ($rowsAffected === false) {
    echo "Error in retrieving number of deleted rows.";
} else {
    echo $rowsAffected . " rows have been deleted.";
}

// Close the connection
sqlsrv_close($conn);
?>
