<?php
include 'conn.php'; // Update with the actual path to conn.php

if (isset($_GET['base_product'])) {
    $base_product = $_GET['base_product'];

    // Define table names
    $tables = [
        'first_process',
        'unique_process',
        'non_machine_process',
        'secondary_process',
        'other_process'
    ];

    // Initialize an array to hold combined results
    $combinedResult = [];

    foreach ($tables as $table) {
        $sql = "SELECT * FROM $table WHERE base_product = ?";
        $params = [$base_product];
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(json_encode(['error' => 'Query failed', 'details' => sqlsrv_errors()]));
        }

        // Fetch all results from the current table
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            // Merge data from different tables into a single associative array
            $combinedResult = array_merge($combinedResult, $row);
        }
    }

    // Check if results are empty
    if (empty($combinedResult)) {
        echo json_encode(['message' => 'No results found']);
    } else {
        echo json_encode($combinedResult); // Return results as a single associative array
    }
}
?>
