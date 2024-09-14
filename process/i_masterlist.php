<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'conn.php';

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

    $rows = array_filter($rows, function ($row) {
        return array_filter($row);
    });

    foreach ($rows as $row) {

        $base_product = isset($row[0]) ? trim($row[0]) : '';
        $car_model = isset($row[1]) ? trim($row[1]) : '';
        $product = isset($row[2]) ? trim($row[2]) : '';
        $car_code = isset($row[3]) ? trim($row[3]) : '';
        $block = isset($row[4]) ? trim($row[4]) : '';
        $class = isset($row[5]) ? trim($row[5]) : '';
        $line_no = isset($row[6]) ? trim($row[6]) : '';
        $circuit_qty = isset($row[7]) ? trim($row[7]) : '';
        
        
        $sql = "
        MERGE m_masterlist AS target
        USING (VALUES (?, ?, ?, ?, ?, ?, ?,?))
        AS source (base_product, car_model, product, car_code, block, class, line_no, circuit_qty)
        ON target.car_model = source.car_model 
           AND target.product = source.product 
           AND target.car_code = source.car_code 
           AND target.block = source.block 
           AND target.class = source.class
        WHEN MATCHED THEN
            UPDATE SET 
                target.base_product = source.base_product,
                target.line_no = source.line_no,
                target.circuit_qty = source.circuit_qty
               
        WHEN NOT MATCHED THEN
            INSERT (base_product, car_model, product, car_code, block, class, line_no, circuit_qty)
            VALUES (source.base_product, source.car_model, source.product, source.car_code, source.block, source.class, source.line_no, source.circuit_qty);
        ";
        
        $params = [
            $base_product, $car_model, $product, $car_code, $block, $class, 
            $line_no, $circuit_qty
        ];
        
        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt === false) {
            $errors[] = 'Error executing statement: ' . print_r(sqlsrv_errors(), true);
        } else {
            $processedCount++;
        }
        
    }

    if (empty($errors)) {
        $response['success'] = true;
        $response['message'] = "Successfully processed $processedCount records.";
    } else {
        $response['message'] = implode("\n", $errors);
    }
} else {
    $response['message'] = 'No data received.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>

