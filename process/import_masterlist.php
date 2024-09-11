<?php
include 'conn.php'; // Include your database connection

// Get the JSON data sent from JavaScript
$input = file_get_contents('php://input');
$data = json_decode($input, true);

$response = [
    'success' => false,
    'message' => 'An error occurred.'
];

if (isset($data['data']) && !empty($data['data'])) {
    $rows = $data['data'];
    $errors = [];
    $processedCount = 0;

    // Filter out empty rows
    $rows = array_filter($rows, function ($row) {
        return array_filter($row); // Remove rows where all values are empty
    });

    foreach ($rows as $row) {
        // Extract values from the row
        $base_product = isset($row[0]) ? trim($row[0]) : '';
        $car_model = isset($row[1]) ? trim($row[1]) : '';
        $product = isset($row[2]) ? trim($row[2]) : '';
        $car_code = isset($row[3]) ? trim($row[3]) : '';
        $block = isset($row[4]) ? trim($row[4]) : '';
        $class = isset($row[5]) ? trim($row[5]) : '';
        $line_no = isset($row[6]) ? trim($row[6]) : '';
        $circuit_qty = isset($row[7]) ? trim($row[7]) : '';
        $trd_nwpa_0_13= isset($row[8]) ? trim($row[8]) : '';

        // Debugging: log values to check data extraction
        error_log("Base Product: $base_product");
        error_log("Car Model: $car_model");
        error_log("Product: $product");
        error_log("Car Code: $car_code");
        error_log("Block: $block");
        error_log("Class: $line_no");
        error_log("Line No: $circuit_qty");
        error_log("Circuit QTY: $block");
        error_log("trd_nwpa_0_13: $trd_nwpa_0_13");

        // SQL upsert query
        $sql = "
            IF EXISTS (SELECT 1 FROM first_process WHERE base_product = ?)
            BEGIN
                UPDATE first_process
                SET car_model = ?, product = ?, car_code = ?, block = ?, class = ?, line_no = ?,circuit_qty = ?, trd_nwpa_0_13 = ?
                WHERE base_product = ?
            END
            ELSE
            BEGIN
                INSERT INTO first_process (base_product, car_model, product, car_code, block, class,line_no,circuit_qty, trd_nwpa_0_13)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            END
        ";

        // Prepare and bind
        $params = [
            $base_product, $car_model, $product, $car_code, $block, $class,$line_no,$circuit_qty,$trd_nwpa_0_13,
 // For UPDATE
            $base_product, // For WHERE clause
            $base_product, $car_model, $product, $car_code, $block, $class,$line_no,$circuit_qty,$trd_nwpa_0_13 // For INSERT
        ];

        $stmt = sqlsrv_prepare($conn, $sql, $params);

        if (!$stmt) {
            // Collect and store detailed error information
            $errors[] = sqlsrv_errors();
        } else {
            if (!sqlsrv_execute($stmt)) {
                // Collect and store detailed error information
                $errors[] = sqlsrv_errors();
            } else {
                $processedCount++;
            }
        }
    }

    if (empty($errors)) {
        $response['success'] = true;
        $response['message'] = "Successfully processed $processedCount rows.";
    } else {
        $response['message'] = 'Errors occurred during processing.';
        $response['errors'] = $errors;
    }
} else {
    $response['message'] = 'No data to process.';
}

// Output JSON response
echo json_encode($response);

sqlsrv_close($conn);
?>
