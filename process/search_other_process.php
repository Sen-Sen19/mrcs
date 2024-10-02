<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';

if (isset($_GET['base_product'])) {
    $base_product = $_GET['base_product'];

   
    $tables = [
        'other_process',
      
    ];

   
    $mergedResult = []; 

    foreach ($tables as $table) {
        $sql = "SELECT * FROM $table WHERE base_product = ?";
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
