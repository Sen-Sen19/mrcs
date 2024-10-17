<?php

include 'conn.php';

header('Content-Type: application/json');

try {
    // Get the posted data
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['index'];  // Get the actual ID from the posted data
    $updatedData = $data['updatedData'];  // Get the updated data

    // Prepare your SQL Update statement
    $sql = "UPDATE [live_mrcs_db].[dbo].[section_2]
            SET car_model = ?, process = ?, machine_inventory = ?, jph3 = ?, wt3 = ?, ot3 = ?, mp3 = ?
            WHERE id = ?"; // Ensure you have an 'id' column to update

    $params = [
        $updatedData['car_model'],
        $updatedData['process'],
        $updatedData['machine_inventory'],
        $updatedData['jph'],
        $updatedData['wt'],
        $updatedData['ot'],
        $updatedData['mp'],
        $id // Use the actual ID to find the correct row
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query was successful
    if ($stmt === false) {
        // Log any errors
        $errors = sqlsrv_errors();
        error_log(print_r($errors, true)); // Log error details for debugging
        echo json_encode(['success' => false, 'message' => 'Database error occurred']);
    } else {
        echo json_encode(['success' => true]);
    }

    // Free the statement and close the connection
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
} catch (Exception $e) {
    // Handle any exceptions and return an error response
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
