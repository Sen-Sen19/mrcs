<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php'; // Ensure the correct path to conn.php

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
    $mergedResult = []; // Array to hold merged results

    foreach ($tables as $table) {
        $sql = "SELECT * FROM $table WHERE base_product = ?";
        $params = [$base_product];
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            echo json_encode(['error' => 'Query failed', 'details' => sqlsrv_errors()]);
            exit; // Stop further processing
        }

        // Fetch all results from the current table
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            // Merge data from different tables into a single associative array
            foreach ($row as $key => $value) {
                $mergedResult[$key] = $value; // Merge results from multiple tables
            }
        }
    }

    // Check if results are empty
    if (empty($mergedResult)) {
        echo json_encode(['message' => 'No results found']);
    } else {
        echo json_encode($mergedResult); // Return results as a single associative array
    }
}
?>
