<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';

if (isset($_GET['base_product'])) {
    $base_product = $_GET['base_product'];

    $tables = [
        'non_machine_process',
    ];

    $mergedResult = []; 

    foreach ($tables as $table) {
        // Update this line to select only the desired columns
        $sql = "SELECT 
                    base_product,
                    car_model,
                    product,
                    car_code,
                    block,
                    class,
                    line_no,
                    circuit_qty,
                    airbag_housing,
    cap_insertion,
    shieldwire_taping,
    gomusen_insertion,
    point_marking,
    looping,
    shikakari_handler,
    black_taping,
    components_insertion
                FROM $table WHERE base_product = ?";
        
        $params = [$base_product];
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            echo json_encode(['error' => 'Query failed', 'details' => sqlsrv_errors()]);
            exit;
        }

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            foreach ($row as $key => $value) {
                $mergedResult[$key] = $value; 
            }
        }
    }

    if (empty($mergedResult)) {
        echo json_encode(['message' => 'No results found']);
    } else {
        echo json_encode($mergedResult); 
    }
}
?>
