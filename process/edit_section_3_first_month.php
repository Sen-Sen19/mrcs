<?php

include 'conn.php';


header('Content-Type: application/json');

try {

    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['index']; 
    $updatedData = $data['updatedData']; 


    $sql = "UPDATE [live_mrcs_db].[dbo].[section_3]
            SET car_model = ?, process = ?, machine_inventory = ?, jph1 = ?, wt1 = ?, ot1 = ?
            WHERE id = ?";
    $params = [
        $updatedData['car_model'],
        $updatedData['process'],
        $updatedData['machine_inventory'],
        $updatedData['jph'],
        $updatedData['wt'],
        $updatedData['ot'],
     
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
