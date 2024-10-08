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
            // SQL query to delete all data from the total_shots table
            $deleteSql = "DELETE FROM total_shots";
            $deleteStmt = sqlsrv_query($conn, $deleteSql);

            // Check for query execution failure
            if ($deleteStmt === false) {
                throw new Exception(print_r(sqlsrv_errors(), true));
            }

            // Now insert the new data
            foreach ($shots_data as $row) {
                // Extract and sanitize values from the current row
                $car_model = htmlspecialchars($row['car_model']);
                $process = htmlspecialchars($row['process']);
                $first_total_shots = (int) $row['first_total_shots'];
                $second_total_shots = (int) $row['second_total_shots'];
                $third_total_shots = (int) $row['third_total_shots'];

                // SQL query to insert data into the total_shots table
                $sql = "INSERT INTO total_shots (car_model, process, first_total_shots, second_total_shots, third_total_shots)
                        VALUES (?, ?, ?, ?, ?)";

                // Prepare and execute the query
                $params = array($car_model, $process, $first_total_shots, $second_total_shots, $third_total_shots);
                $stmt = sqlsrv_query($conn, $sql, $params);

                // Check for query execution failure
                if ($stmt === false) {
                    throw new Exception(print_r(sqlsrv_errors(), true));
                }
            }

            // Commit the transaction if everything is successful
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
