<?php
include 'conn.php'; 

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data)) {

    sqlsrv_begin_transaction($conn);

    $deleteSql = "DELETE FROM selected_plan_date";


    if (!sqlsrv_query($conn, $deleteSql)) {
        echo json_encode(["status" => "error", "message" => sqlsrv_errors()]);
        sqlsrv_rollback($conn); 
        exit; 
    }

    $chunkSize = 1000;
    $chunks = array_chunk($data, $chunkSize);


    foreach ($chunks as $chunk) {

        $sql = "INSERT INTO selected_plan_date 
                (base_product, manufacturing_location, customer_manufacturer, shipping_location, 
                vehicle_type, vehicle_type_name, wh_type, wh_type_name, assy_group_name, 
                item, internal_item_number, line, poly_size, capacity, product_category, 
                production_grp, section, circuit, initial_process, secondary_process, later_process, 
                date, value, car_model) VALUES ";

        $valuesArr = [];
        foreach ($chunk as $row) {

            $baseProduct = addslashes($row['base_product']);
            $manufacturingLocation = addslashes($row['manufacturing_location']);
            $customerManufacturer = addslashes($row['customer_manufacturer']);
            $shippingLocation = addslashes($row['shipping_location']);
            $vehicleType = addslashes($row['vehicle_type']);
            $vehicleTypeName = addslashes($row['vehicle_type_name']);
            $whType = addslashes($row['wh_type']);
            $whTypeName = addslashes($row['wh_type_name']);
            $assyGroupName = addslashes($row['assy_group_name']);
            $item = addslashes($row['item']);
            $internalItemNumber = addslashes($row['internal_item_number']);
            $line = addslashes($row['line']);
            $polySize = addslashes($row['poly_size']);
            $capacity = addslashes($row['capacity']);
            $productCategory = addslashes($row['product_category']);
            $productionGrp = addslashes($row['production_grp']);
            $section = addslashes($row['section']);
            $circuit = addslashes($row['circuit']);
            $initialProcess = addslashes($row['initial_process']);
            $secondaryProcess = addslashes($row['secondary_process']);
            $laterProcess = addslashes($row['later_process']);
            $value = addslashes($row['value']);


            $date = new DateTime($row['date']);
            $date->modify('+1 day');
            $formattedDate = $date->format('Y-m-d'); 

           
            $carModelSql = "SELECT car_model FROM m_masterlist WHERE base_product = ?";
            $params = [$baseProduct];
            $carModelResult = sqlsrv_query($conn, $carModelSql, $params);
            $carModelRow = sqlsrv_fetch_array($carModelResult, SQLSRV_FETCH_ASSOC);


            $carModel = isset($carModelRow['car_model']) ? addslashes($carModelRow['car_model']) : 'NULL';

        
            $valuesArr[] = "('$baseProduct', '$manufacturingLocation', '$customerManufacturer', '$shippingLocation', 
                            '$vehicleType', '$vehicleTypeName', '$whType', '$whTypeName', '$assyGroupName', 
                            '$item', '$internalItemNumber', '$line', '$polySize', '$capacity', '$productCategory', 
                            '$productionGrp', '$section', '$circuit', '$initialProcess', '$secondaryProcess', 
                            '$laterProcess', '$formattedDate', '$value', '$carModel')";
        }


        $sql .= implode(",", $valuesArr);


        if (!sqlsrv_query($conn, $sql)) {
            echo json_encode(["status" => "error", "message" => sqlsrv_errors()]);
            sqlsrv_rollback($conn); 
            exit; 
        }
    }


    sqlsrv_commit($conn);
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "No data received"]);
}


error_log($sql);
?>
