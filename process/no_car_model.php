<?php
// Include database connection
include 'conn.php';

// Query to select base_product and added_by from the table
$sql = "SELECT [base_product], [added_by] FROM [live_mrcs_db].[dbo].[no_car_model]";

// Execute the query
$query = sqlsrv_query($conn, $sql);

// Check if the query was successful
if ($query === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Prepare an array to group products by the 'added_by' field
$userData = [];

// Fetch the results and group them by 'added_by'
while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
    $userData[$row['added_by']][] = $row['base_product'];
}

// Close the connection
sqlsrv_close($conn);

// Return the grouped data
return $userData;
?>
