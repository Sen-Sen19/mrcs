<?php
ob_start(); // Start output buffering
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

// Include your database connection
include 'conn.php';

if ($conn === false) {
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['planData'])) {
    $planData = $_POST['planData'];

    // Prepare the SQL query
    $insertQuery = "INSERT INTO plan_2 (base_product, first_month, second_month, third_month) VALUES (?, ?, ?, ?)";

    foreach ($planData as $row) {
        $params = [
            $row['base_product'],
            $row['first_month'],
            $row['second_month'],
            $row['third_month']
        ];

        // Prepare and execute the statement
        $stmt = sqlsrv_prepare($conn, $insertQuery, $params);

        if (!$stmt || !sqlsrv_execute($stmt)) {
            // Output SQL errors
            $errors = sqlsrv_errors();
            echo json_encode(['error' => 'SQL error', 'details' => $errors]);
            exit();
        }
    }

    // Success response
    echo json_encode(['success' => 'Data successfully saved!']);
} else {
    echo json_encode(['error' => 'Invalid request']);
}

ob_end_flush(); // Flush the output buffer
?>
