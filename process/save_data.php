<?php

include 'conn.php';

ini_set('memory_limit', '4096M');
ini_set('post_max_size', '2000M');
ini_set('upload_max_filesize', '2000M');

// Function to format date
function formatDate($date)
{
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

// Decode JSON data
$data = json_decode(file_get_contents('php://input'), true);

// Delete existing data from the table
$deleteQuery = "DELETE FROM plan_from_pc";
$deleteStmt = sqlsrv_query($conn, $deleteQuery);

if ($deleteStmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Prepare the insert query
$query = "
    INSERT INTO plan_from_pc (
        manufacturing_location, base_product, date, value, 
        customer_manufacturer, vehicle_type, vehicle_type_name, wh_type,
        wh_type_name, assy_group_name, item,
        internal_item_number, line, poly_size, capacity, product_category,
        section, circuit, initial_process, secondary_process, shipping_location, production_grp, later_process
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
";

// Insert new data
foreach ($data as $row) {
    $baseProduct = $row['base_product'];
    $date = formatDate($row['date']);
    $value = $row['value'];

    // Use isset() to check if the keys exist before accessing them
    $manufacturingLocationCode = $row['manufacturing_location'] ?? null;
    $shippingLocation = $row['shipping_location'] ?? null;
    $customerManufacturerCode = $row['customer_manufacturer'] ?? null;
    $vehicleType = $row['vehicle_type'] ?? null;
    $vehicleTypeName = $row['vehicle_type_name'] ?? null;
    $whType = $row['wh_type'] ?? null;
    $whTypeName = $row['wh_type_name'] ?? null;
    $assyGroupName = $row['assy_group_name'] ?? null;
    $item = $row['item'] ?? null;
    $internalItemNumber = $row['internal_item_number'] ?? null;
    $line = $row['line'] ?? null; // Check if 'line' exists
    $polySize = $row['poly_size'] ?? null; // Check if 'poly_size' exists
    $capacity = $row['capacity'] ?? null;
    $productCategory = $row['product_category'] ?? null;
    $section = $row['section'] ?? null;
    $circuit = $row['circuit'] ?? null;
    $initialProcess = $row['initial_process'] ?? null;
    $secondaryProcess = $row['secondary_process'] ?? null;
    $productionGrp = $row['production_grp'] ?? null;
    $later_process = $row['later_process'] ?? null;

    // Check for valid date format
    if ($date === null) {
        echo "Invalid date format: " . htmlspecialchars($row['date']);
        continue;
    }

    $params = [
        $manufacturingLocationCode,
        $baseProduct,
        $date,
        $value,
        $customerManufacturerCode,
        $vehicleType,
        $vehicleTypeName,
        $whType,
        $whTypeName,
        $assyGroupName,
        $item,
        $internalItemNumber,
        $line,
        $polySize,
        $capacity,
        $productCategory,
        $section,
        $circuit,
        $initialProcess,
        $secondaryProcess,
        $shippingLocation,
        $productionGrp,
        $later_process,
    ];

    // Execute the SQL insert query
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