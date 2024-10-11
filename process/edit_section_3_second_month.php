<?php
// Include your connection file
include 'conn.php';

// Set header to indicate that we're returning JSON
header('Content-Type: application/json');

try {
    // Get the posted data
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['index'];  // Get the actual ID from the posted data
    $updatedData = $data['updatedData'];  // Get the updated data


    $sql = "UPDATE [live_mrcs_db].[dbo].[section_3]
            SET car_model = ?, process = ?, machine_inventory = ?, jph2 = ?, wt2 = ?, ot2 = ?, mp2 = ?
            WHERE id = ?"; // Ensure you have an 'id' column to update

    $params = [
        $updatedData['car_model'],
        $updatedData['process'],
        $updatedData['machine_inventory'],
        $updatedData['jph'],
        $updatedData['wt'],
        $updatedData['ot'],
        $updatedData['mp'],
        $id 
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);


    if ($stmt === false) {
 
        $errors = sqlsrv_errors();
        error_log(print_r($errors, true)); 
        echo json_encode(['success' => false, 'message' => 'Database error occurred']);
    } else {
        echo json_encode(['success' => true]);
    }

  
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
} catch (Exception $e) {

    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
