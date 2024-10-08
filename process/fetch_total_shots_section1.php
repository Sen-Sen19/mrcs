<?php
// Include the database connection file
include 'conn.php'; // Ensure the path is correct

// Check if the connection is established
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Prepare the SQL query
$carModel = 'suzuki old'; // The car model to filter
$sql = "SELECT TOP (1000) [car_model], [process], [first_total_shots] AS value, 
        [second_total_shots] AS second_value, [third_total_shots] AS third_value 
        FROM [live_mrcs_db].[dbo].[total_shots] 
        WHERE car_model = ?";

// Prepare and execute the statement
$params = array($carModel);
$stmt = sqlsrv_query($conn, $sql, $params);

// Check if the query was executed successfully
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch all results
$results = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $results[] = $row;
}

// Return the results as JSON
header('Content-Type: application/json');
echo json_encode($results);

// Free the statement and close the connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
