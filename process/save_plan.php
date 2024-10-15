<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

include 'conn.php';

if ($conn === false) {
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['planData']) && is_array($_POST['planData'])) {
    $planData = $_POST['planData'];

    $insertQuery = "INSERT INTO plan_2 (base_product, first_month, second_month, third_month) VALUES (?, ?, ?, ?)";

    foreach ($planData as $row) {
        if (isset($row['base_product'], $row['first_month'], $row['second_month'], $row['third_month'])) {
            $params = [
                $row['base_product'],
                $row['first_month'],
                $row['second_month'],
                $row['third_month']
            ];

            $stmt = sqlsrv_prepare($conn, $insertQuery, $params);

            if (!$stmt || !sqlsrv_execute($stmt)) {
                $errors = sqlsrv_errors();
                echo json_encode(['error' => 'SQL error', 'details' => $errors]);
                exit();
            }
        } else {
            echo json_encode(['error' => 'Missing data in row', 'row' => $row]);
            exit();
        }
    }

    echo json_encode(['success' => 'Data successfully saved!']);
} else {
    echo json_encode(['error' => 'Invalid request']);
}

ob_end_flush();
?>
