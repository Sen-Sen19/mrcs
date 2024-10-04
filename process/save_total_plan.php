<?php
$serverName = "172.25.115.167\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "live_mrcs_db",
    "Uid" => "sa",
    "PWD" => '#Sy$temGr0^p|115167'
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true)); // Show connection errors
}

// Check if data was sent
if (isset($_POST['plans'])) {
    $plans = $_POST['plans'];

    // Prepare the SQL statement to delete existing records
    $deleteSql = "DELETE FROM total_plan";
    
    // Execute the DELETE statement
    $deleteStmt = sqlsrv_query($conn, $deleteSql);
    if ($deleteStmt === false) {
        die(print_r(sqlsrv_errors(), true)); // Show execution errors
    }

    // Prepare the SQL statement for insertion
    $sql = "INSERT INTO total_plan (car_code, first_month, max_plan_1, second_month, max_plan_2, third_month, max_plan_3) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Loop through each plan and insert it
    foreach ($plans as $plan) {
        $params = array($plan['car_code'], $plan['first_month'], $plan['max_plan_1'], $plan['second_month'], $plan['max_plan_2'], $plan['third_month'], $plan['max_plan_3']);
        $stmt = sqlsrv_prepare($conn, $sql, $params);
        
        if (!sqlsrv_execute($stmt)) {
            die(print_r(sqlsrv_errors(), true)); // Show execution errors
        }
    }
    
    echo json_encode(['success' => true, 'message' => 'Data saved successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'No data received.']);
}

// Close the connection
sqlsrv_close($conn);
?>
