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
        $airbag_housing = isset($row[8]) ? trim($row[8]) : '';
        $cap_insertion = isset($row[9]) ? trim($row[9]) : '';
        $shieldwire_taping = isset($row[10]) ? trim($row[10]) : '';
        $gomusen_insertion = isset($row[11]) ? trim($row[11]) : '';
        $point_marking = isset($row[12]) ? trim($row[12]) : '';
        $looping = isset($row[13]) ? trim($row[13]) : '';
        $shikakari_handler = isset($row[14]) ? trim($row[14]) : '';
        $black_taping = isset($row[15]) ? trim($row[15]) : '';
        $components_insertion = isset($row[16]) ? trim($row[16]) : '';
        
        $sql = "
        MERGE non_machine_process AS target
        USING (VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                       ?, ?, ?, ?, ?, ?, ?))
        AS source (base_product, car_model, product, car_code, block, class, line_no, circuit_qty, airbag_housing, cap_insertion, shieldwire_taping, gomusen_insertion, point_marking, looping, shikakari_handler, black_taping, components_insertion)
        ON target.car_model = source.car_model 
           AND target.product = source.product 
           AND target.car_code = source.car_code 
           AND target.block = source.block 
           AND target.class = source.class
        WHEN MATCHED THEN
            UPDATE SET 
                target.base_product = source.base_product,
                target.line_no = source.line_no,
                target.circuit_qty = source.circuit_qty,
                target.airbag_housing = source.airbag_housing,
                target.cap_insertion = source.cap_insertion,
                target.shieldwire_taping = source.shieldwire_taping,
                target.gomusen_insertion = source.gomusen_insertion,
                target.point_marking = source.point_marking,
                target.looping = source.looping,
                target.shikakari_handler = source.shikakari_handler,
                target.black_taping = source.black_taping,
                target.components_insertion = source.components_insertion
        WHEN NOT MATCHED THEN
            INSERT (base_product, car_model, product, car_code, block, class, line_no, circuit_qty, airbag_housing, cap_insertion, shieldwire_taping, gomusen_insertion, point_marking, looping, shikakari_handler, black_taping, components_insertion)
            VALUES (source.base_product, source.car_model, source.product, source.car_code, source.block, source.class, source.line_no, source.circuit_qty, source.airbag_housing, source.cap_insertion, source.shieldwire_taping, source.gomusen_insertion, source.point_marking, source.looping, source.shikakari_handler, source.black_taping, source.components_insertion);
        ";
        
        $params = [
            $base_product, $car_model, $product, $car_code, $block, $class, 
            $line_no, $circuit_qty, $airbag_housing, $cap_insertion, 
            $shieldwire_taping, $gomusen_insertion, $point_marking, 
            $looping, $shikakari_handler, $black_taping, $components_insertion
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

