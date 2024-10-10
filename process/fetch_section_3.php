<?php
// Include your connection file
include 'conn.php';

// Query to fetch data
$sql = "SELECT car_model, process, machine_inventory, jph1, wt1, ot1, mp1, jph2, wt2, ot2, mp2, jph3, wt3, ot3, mp3, id
        FROM [live_mrcs_db].[dbo].[section_3]";

// Execute the query
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Initialize an array to hold the results
$data = array();

// Fetch each row and add it to the array
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}

// Return data as JSON
header('Content-Type: application/json');  // Set the content type to JSON
echo json_encode($data);

// Free the statement and close the connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
