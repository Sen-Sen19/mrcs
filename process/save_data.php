<?php








include 'conn.php'; 
// Increase memory and upload limits
ini_set('memory_limit', '1024M'); // Increase as needed
ini_set('post_max_size', '500M');
ini_set('upload_max_filesize', '500M');

function formatDate($date) {
    $d = DateTime::createFromFormat('Y-m-d', $date);
    if ($d && $d->format('Y-m-d') === $date) {
        return $date;
    } else {
        
        $d = DateTime::createFromFormat('Y/m/d', $date);
        if ($d) {
            return $d->format('Y-m-d');
        } else {
            return null; 
        }
    }
}
// Decode the incoming JSON data

$data = json_decode(file_get_contents('php://input'), true);
// Define the SQL query with the remaining fields
$query = "
    INSERT INTO plan_from_pc (
        manufacturing_location, base_product, date, value, 
        customer_manufacturer, vehicle_type, vehicle_type_name, wh_type,
        wh_type_name, assy_group_name, item,
        internal_item_number, line, poly_size, capacity, product_category,
        section, circuit, initial_process, secondary_process,shipping_location, production_grp, later_process
    ) VALUES (?, ?, ?,  ?, ?, ?, ?, ?, ?,
              ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
              ?, ?, ?, ?)
";

// Loop through the data and insert each row into the database
foreach ($data as $row) {
    $baseProduct = $row['base_product'];
    $date = formatDate($row['date']);
    $value = $row['value'];

    $manufacturingLocationCode = $row['manufacturing_location'];
    $shippingLocation = $row['shipping_location'];
    $customerManufacturerCode = $row['customer_manufacturer'];
    $vehicleType = $row['vehicle_type'];
    $vehicleTypeName = $row['vehicle_type_name'];
    $whType = $row['wh_type'];
    $whTypeName = $row['wh_type_name'];
    $assyGroupName = $row['assy_group_name'];
    $item = $row['item'];
    $internalItemNumber = $row['internal_item_number'];
    $line = $row['line'];
    $polySize = $row['poly_size'];
    $capacity = $row['capacity'];
    $productCategory = $row['product_category'];
    $section = $row['section'];
    $circuit = $row['circuit'];
    $initialProcess = $row['initial_process'];
    $secondaryProcess = $row['secondary_process'];
    $productionGrp = $row['production_grp'];
    $later_process = $row['later_process']; // Updated to lowercase

    // Check for valid date format
    if ($date === null) {
        echo "Invalid date format: " . htmlspecialchars($row['date']);
        continue; 
    }

    // Prepare parameters for the SQL query
    $params = [
        $manufacturingLocationCode, $baseProduct, $date, $value, 
        $customerManufacturerCode, $vehicleType, $vehicleTypeName, $whType,
        $whTypeName, $assyGroupName, $item,
        $internalItemNumber, $line, $polySize, $capacity, $productCategory,
        $section, $circuit, $initialProcess, $secondaryProcess, $shippingLocation, $productionGrp, $later_process,
    ];

    // Execute the query
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
}

echo "Data successfully saved.";





























// include 'conn.php'; 
// // Increase memory and upload limits
// ini_set('memory_limit', '1024M'); // Increase as needed
// ini_set('post_max_size', '500M');
// ini_set('upload_max_filesize', '500M');

// function formatDate($date) {
//     $d = DateTime::createFromFormat('Y-m-d', $date);
//     if ($d && $d->format('Y-m-d') === $date) {
//         return $date;
//     } else {
        
//         $d = DateTime::createFromFormat('Y/m/d', $date);
//         if ($d) {
//             return $d->format('Y-m-d');
//         } else {
//             return null; 
//         }
//     }
// }
// // Decode the incoming JSON data

// $data = json_decode(file_get_contents('php://input'), true);
// // Define the SQL query with the remaining fields
// $query = "
//     INSERT INTO plan_from_pc (
//         manufacturing_location, base_product, date, value, max_plan,
//         customer_manufacturer, vehicle_type, vehicle_type_name, wh_type,
//         wh_type_name, assy_group_name, item,
//         internal_item_number, line, poly_size, capacity, product_category,
//         section, circuit, initial_process, secondary_process,shipping_location, production_grp, later_process
//     ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
//               ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
//               ?, ?, ?, ?)
// ";

// // Loop through the data and insert each row into the database
// foreach ($data as $row) {
//     $baseProduct = $row['base_product'];
//     $date = formatDate($row['date']);
//     $value = $row['value'];
//     $maxPlan = $row['max_plan'];
//     $manufacturingLocationCode = $row['manufacturing_location'];
//     $shippingLocation = $row['shipping_location'];
//     $customerManufacturerCode = $row['customer_manufacturer'];
//     $vehicleType = $row['vehicle_type'];
//     $vehicleTypeName = $row['vehicle_type_name'];
//     $whType = $row['wh_type'];
//     $whTypeName = $row['wh_type_name'];
//     $assyGroupName = $row['assy_group_name'];
//     $item = $row['item'];
//     $internalItemNumber = $row['internal_item_number'];
//     $line = $row['line'];
//     $polySize = $row['poly_size'];
//     $capacity = $row['capacity'];
//     $productCategory = $row['product_category'];
//     $section = $row['section'];
//     $circuit = $row['circuit'];
//     $initialProcess = $row['initial_process'];
//     $secondaryProcess = $row['secondary_process'];
//     $productionGrp = $row['production_grp'];
//     $later_process = $row['later_process']; // Updated to lowercase

//     // Check for valid date format
//     if ($date === null) {
//         echo "Invalid date format: " . htmlspecialchars($row['date']);
//         continue; 
//     }

//     // Prepare parameters for the SQL query
//     $params = [
//         $manufacturingLocationCode, $baseProduct, $date, $value, $maxPlan,
//         $customerManufacturerCode, $vehicleType, $vehicleTypeName, $whType,
//         $whTypeName, $assyGroupName, $item,
//         $internalItemNumber, $line, $polySize, $capacity, $productCategory,
//         $section, $circuit, $initialProcess, $secondaryProcess, $shippingLocation, $productionGrp, $later_process,
//     ];

//     // Execute the query
//     $stmt = sqlsrv_query($conn, $query, $params);

//     if ($stmt === false) {
//         die(print_r(sqlsrv_errors(), true));
//     }
// }

// echo "Data successfully saved.";
?>
