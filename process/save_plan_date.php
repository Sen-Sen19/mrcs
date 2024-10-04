<?php
include 'conn.php'; // Include your database connection

// Get the data from POST request
$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data)) {
    // Start a transaction
    sqlsrv_begin_transaction($conn);

    // Prepare the SQL query to delete existing data
    $deleteSql = "DELETE FROM selected_plan_date";

    // Execute the delete query
    if (!sqlsrv_query($conn, $deleteSql)) {
        echo json_encode(["status" => "error", "message" => sqlsrv_errors()]);
        sqlsrv_rollback($conn); // Rollback transaction on error
        exit; // Exit if delete fails
    }

    // Set the chunk size to 1000 rows (SQL Server's maximum limit)
    $chunkSize = 1000;
    $chunks = array_chunk($data, $chunkSize);

    // Insert data in chunks
    foreach ($chunks as $chunk) {
        // Prepare the SQL query to insert data
        $sql = "INSERT INTO selected_plan_date 
                (base_product, manufacturing_location, customer_manufacturer, shipping_location, 
                vehicle_type, vehicle_type_name, wh_type, wh_type_name, assy_group_name, 
                item, internal_item_number, line, poly_size, capacity, product_category, 
                production_grp, section, circuit, initial_process, secondary_process, later_process, 
                date, value, car_model) VALUES ";

        $valuesArr = [];
        foreach ($chunk as $row) {
            $baseProduct = addslashes($row['base_product']);
            $internalItemNumber = addslashes($row['internal_item_number']);

            // Query to get car_model from m_masterlist using base_product
            $carModelSql = "SELECT car_model FROM m_masterlist 
                            WHERE base_product = ?";
            $params = [$baseProduct];
            $carModelResult = sqlsrv_query($conn, $carModelSql, $params);
            $carModelRow = sqlsrv_fetch_array($carModelResult, SQLSRV_FETCH_ASSOC);

            // If car_model exists, use it; otherwise, set it to null
            $carModel = $carModelRow['car_model'] ?? 'NULL';

            // Prepare values for the insert query, ensuring to add the car_model
            $valuesArr[] = "('" . implode("','", array_map('addslashes', $row)) . "','" . addslashes($carModel) . "')";
        }

        $sql .= implode(",", $valuesArr);

        // Execute the insert query
        if (!sqlsrv_query($conn, $sql)) {
            echo json_encode(["status" => "error", "message" => sqlsrv_errors()]);
            sqlsrv_rollback($conn); // Rollback transaction on error
            exit; // Exit if insert fails
        }
    }

    // Commit the transaction if all inserts succeed
    sqlsrv_commit($conn);
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "No data received"]);
}

// Log the last SQL statement executed
error_log($sql);
?>
