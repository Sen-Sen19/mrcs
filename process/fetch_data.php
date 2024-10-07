<?php
ini_set('memory_limit', '2G'); 
ini_set('post_max_size', '256M'); 
ini_set('upload_max_filesize', '256M'); 

include 'conn.php'; 
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Prepare the SQL query to fetch data
$sql = "SELECT 
            [base_product], 
            [manufacturing_location], 
            [customer_manufacturer], 
            [shipping_location], 
            [vehicle_type], 
            [vehicle_type_name], 
            [wh_type], 
            [wh_type_name], 
            [assy_group_name], 
            [item], 
            [internal_item_number], 
            [line], 
            [poly_size], 
            [capacity], 
            [product_category], 
            [production_grp], 
            [section], 
            [circuit], 
            [initial_process], 
            [secondary_process], 
            [later_process], 
            CONVERT(varchar, [date], 120) AS [date], 
            [value]
           
        FROM plan_from_pc";

$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    die('Query error: ' . print_r(sqlsrv_errors(), true));
}

$data = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}

// Return data as JSON
header('Content-Type: application/json; charset=utf-8');

$json = json_encode($data);
if ($json === false) {
    die('JSON encoding error: ' . json_last_error_msg());
}

echo $json;
?>
