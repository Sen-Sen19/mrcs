<?php
// Include your database connection
include 'conn.php';

// Get the JSON input from the request
$data = json_decode(file_get_contents('php://input'), true);

// Check if the data is an array
if (is_array($data) && isset($data['fullName'], $data['tableData'])) {
    $addedBy = $data['fullName']; // Get the full name from the request

    // Delete existing records for the same added_by value
    $deleteSql = "DELETE FROM total_plan WHERE added_by = ?";
    $deleteStmt = sqlsrv_query($conn, $deleteSql, [$addedBy]);

    $deleteplan = "DELETE FROM plan_2 WHERE added_by = ?";
    $deleteplanStmt = sqlsrv_query($conn, $deleteplan, [$addedBy]);
    

    if ($deleteStmt === false) {
        die(json_encode(['message' => 'Error deleting existing data: ' . print_r(sqlsrv_errors(), true)]));
    }

    foreach ($data['tableData'] as $row) {
        // Prepare your SQL INSERT statement
        $sql = "INSERT INTO total_plan (car_code, first_month, max_plan_1, second_month, max_plan_2, third_month, max_plan_3, added_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Bind parameters
        $params = [
            $row['first'],              // car_code
            $row['sixthToLast'],       // first_month
            $row['fifthToLast'],       // max_plan_1
            $row['fourthToLast'],      // second_month
            $row['thirdToLast'],       // max_plan_2
            $row['secondToLast'],      // third_month
            $row['last'],               // max_plan_3
            $addedBy                    // added_by
        ];

        // Execute the statement
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(json_encode(['message' => 'Error inserting data: ' . print_r(sqlsrv_errors(), true)]));
        }
    }

    // Success response
    echo json_encode(['message' => 'Data saved successfully']);
} else {
    echo json_encode(['message' => 'Invalid data format']);
}
?>
