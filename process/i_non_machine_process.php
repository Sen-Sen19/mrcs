<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file']['tmp_name'];


    if (($handle = fopen($file, 'r')) !== FALSE) {
        fgetcsv($handle);


        $deleteSql = "DELETE FROM [live_mrcs_db].[dbo].[non_machine_process]";
        $deleteStmt = sqlsrv_query($conn, $deleteSql);

        if ($deleteStmt === false) {
            echo json_encode(['success' => false, 'error' => sqlsrv_errors()]);
            exit;
        }


        $sql = "INSERT INTO [live_mrcs_db].[dbo].[non_machine_process] (
            base_product,
            car_model,
            product,
            car_code,
            block,
            class,
            line_no,
            circuit_qty,
            airbag_housing,
            cap_insertion,
            shieldwire_taping,
            gomusen_insertion,
            point_marking,
            looping,
            shikakari_handler,
            black_taping,
            components_insertion

        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?)";

        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            $stmt = sqlsrv_prepare($conn, $sql, $data);
            if (!sqlsrv_execute($stmt)) {
                echo json_encode(['success' => false, 'error' => sqlsrv_errors()]);
                exit;
            }
        }

        fclose($handle);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Could not open the CSV file.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request.']);
}

sqlsrv_close($conn);
?>