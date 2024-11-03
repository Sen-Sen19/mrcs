<?php
// Start output buffering
ob_start();
include 'conn.php'; // Include your database connection

// Set headers for JSON response
header('Content-Type: application/json');

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the raw POST data
    $rawData = file_get_contents('php://input');
    $shots_data = json_decode($rawData, true); // Decode the JSON data

    // Check if shots_data is received properly
    if (!empty($shots_data['shots_data'])) {
        $shots_data = $shots_data['shots_data']; // Extract the array of shots data

        // Begin transaction
        sqlsrv_begin_transaction($conn);

        try {
            // Delete existing data matching added_by
            $added_by = htmlspecialchars($shots_data[0]['added_by']); // Get the added_by value from the first data row
            $deleteSql = "DELETE FROM total_shots WHERE added_by = ?";
            $deleteStmt = sqlsrv_query($conn, $deleteSql, array($added_by));

           
            if ($deleteStmt === false) {
                throw new Exception(print_r(sqlsrv_errors(), true));
            }


            foreach ($shots_data as $row) {
                // Extract and sanitize values from the current row
                $car_model = htmlspecialchars($row['car_model']);
                $process = htmlspecialchars($row['process']);
                $first_total_shots = (int) $row['first_total_shots'];
                $second_total_shots = (int) $row['second_total_shots'];
                $third_total_shots = (int) $row['third_total_shots'];
                $added_by = htmlspecialchars($row['added_by']); // Get added_by value

                $sql = "INSERT INTO total_shots (car_model, process, first_total_shots, second_total_shots, third_total_shots, added_by)
                        VALUES (?, ?, ?, ?, ?, ?)";

                $params = array($car_model, $process, $first_total_shots, $second_total_shots, $third_total_shots, $added_by);
                $stmt = sqlsrv_query($conn, $sql, $params);

                // Check for query execution failure
                if ($stmt === false) {
                    throw new Exception(print_r(sqlsrv_errors(), true));
                }
            }

         
            sqlsrv_commit($conn);
            echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully']);
        } catch (Exception $e) {
            // Rollback the transaction in case of error
            sqlsrv_rollback($conn);
            echo json_encode(['status' => 'error', 'message' => 'Error inserting data: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No data received']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
