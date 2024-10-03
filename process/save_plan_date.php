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

    // Prepare the SQL query to insert data
    $sql = "INSERT INTO selected_plan_date 
            (base_product, manufacturing_location, customer_manufacturer, shipping_location, 
            vehicle_type, vehicle_type_name, wh_type, wh_type_name, assy_group_name, 
            item, internal_item_number, line, poly_size, capacity, product_category, 
            production_grp, section, circuit, initial_process, secondary_process, later_process, 
            date, value) VALUES ";

    $valuesArr = [];
    foreach ($data as $row) {
        $valuesArr[] = "('" . 
            implode("','", array_map('addslashes', $row)) . 
            "')";
    }

    $sql .= implode(",", $valuesArr);

    // Execute the insert query
    if (sqlsrv_query($conn, $sql)) {
        sqlsrv_commit($conn); // Commit transaction if insert succeeds
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => sqlsrv_errors()]);
        sqlsrv_rollback($conn); // Rollback transaction on error
    }
} else {
    echo json_encode(["status" => "error", "message" => "No data received"]);
}
error_log($sql); // This will log the SQL to your PHP error log
?>
