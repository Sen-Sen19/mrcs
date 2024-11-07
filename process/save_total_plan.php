<?php
include 'conn.php';


$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


if (isset($_POST['plans'])) {
    $plans = $_POST['plans'];


    $deleteSql = "DELETE FROM total_plan";


    $deleteStmt = sqlsrv_query($conn, $deleteSql);
    if ($deleteStmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }


    $sql = "INSERT INTO total_plan (car_code, first_month, max_plan_1, second_month, max_plan_2, third_month, max_plan_3) VALUES (?, ?, ?, ?, ?, ?, ?)";


    foreach ($plans as $plan) {
        $params = array($plan['car_code'], $plan['first_month'], $plan['max_plan_1'], $plan['second_month'], $plan['max_plan_2'], $plan['third_month'], $plan['max_plan_3']);
        $stmt = sqlsrv_prepare($conn, $sql, $params);

        if (!sqlsrv_execute($stmt)) {
            die(print_r(sqlsrv_errors(), true));
        }
    }

    echo json_encode(['success' => true, 'message' => 'Data saved successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'No data received.']);
}


sqlsrv_close($conn);
?>