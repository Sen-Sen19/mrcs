<?php
include 'conn.php';
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch data from the database
$sql = "SELECT [base_product], [manufacturing_location], [customer_manufacturer], 
               [shipping_location], [vehicle_type], [vehicle_type_name], 
               [wh_type], [wh_type_name], [assy_group_name], 
               [item], [internal_item_number], [line], 
               [poly_size], [capacity], [product_category], 
               [production_grp], [section], [circuit], 
               [initial_process], [secondary_process], 
               [later_process], [date], [value]
        FROM [live_mrcs_db].[dbo].[selected_plan_date]";

$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Prepare data for display
$data = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $baseProduct = $row['base_product'];
    if (!isset($data[$baseProduct])) {
        $data[$baseProduct] = [
            'base_product' => $baseProduct,
            'manufacturing_location' => $row['manufacturing_location'],
            'customer_manufacturer' => $row['customer_manufacturer'],
            'shipping_location' => $row['shipping_location'],
            'vehicle_type' => $row['vehicle_type'],
            'vehicle_type_name' => $row['vehicle_type_name'],
            'wh_type' => $row['wh_type'],
            'wh_type_name' => $row['wh_type_name'],
            'assy_group_name' => $row['assy_group_name'],
            'item' => $row['item'],
            'internal_item_number' => $row['internal_item_number'],
            'line' => $row['line'],
            'poly_size' => $row['poly_size'],
            'capacity' => $row['capacity'],
            'product_category' => $row['product_category'],
            'production_grp' => $row['production_grp'],
            'section' => $row['section'],
            'circuit' => $row['circuit'],
            'initial_process' => $row['initial_process'],
            'secondary_process' => $row['secondary_process'],
            'later_process' => $row['later_process'],
            'dates' => [], // Initialize an array for dates
            'values' => [] // Initialize an array for values
        ];
    }
    // Add date and value to the corresponding base product
    $data[$baseProduct]['dates'][] = $row['date']->format('Y-m-d');
    $data[$baseProduct]['values'][] = $row['value'];
}

// Format the data into a more display-friendly structure
$formattedData = [];
foreach ($data as $key => $item) {
    $formattedData[] = array_merge(
        $item,
        array_combine($item['dates'], $item['values']) // Combine dates with values
    );
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

// Return the formatted data for inclusion
return $formattedData;
?>
