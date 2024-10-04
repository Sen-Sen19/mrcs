<?php
// Include the database connection file
include 'conn.php';

// Initialize an empty array to store results
$resultArray = [];

// SQL query to fetch the base_product and car_model from m_masterlist
$sql = "SELECT base_product, car_model FROM [live_mrcs_db].[dbo].[m_masterlist]";

try {
    // Execute the query
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true)); // Show query errors
    }

    // Fetch all results into the result array
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $resultArray[] = $row;
    }

    // Return the results as JSON
    echo json_encode($resultArray);
} catch (Exception $e) {
    // Handle any errors
    echo json_encode(['error' => $e->getMessage()]);
}

// Free statement and close the connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
