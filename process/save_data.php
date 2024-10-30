<?php

include 'conn.php';

ini_set('memory_limit', '4096M');
ini_set('post_max_size', '2000M');
ini_set('upload_max_filesize', '2000M');

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

$data = json_decode(file_get_contents('php://input'), true);

// Get the 'added_by' value from the first entry of data (assuming all entries share the same 'added_by' value)
$addedBy = $data[0]['added_by'] ?? null;

if ($addedBy === null) {
    die("Error: 'added_by' field is required.");
}

// Delete existing data where 'added_by' matches the user currently inserting
$deleteQuery = "DELETE FROM plan_from_pc WHERE added_by = ?";
$deleteStmt = sqlsrv_query($conn, $deleteQuery, [$addedBy]);

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
        section, circuit, initial_process, secondary_process, shipping_location, production_grp, later_process, added_by
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
";

// Insert each row of data
foreach ($data as $row) {
    $baseProduct = $row['base_product'];
    $date = formatDate($row['date']);
    $value = $row['value'];
    
    // Define each field from $row
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
    $line = $row['line'] ?? null; 
    $polySize = $row['poly_size'] ?? null;
    $capacity = $row['capacity'] ?? null;
    $productCategory = $row['product_category'] ?? null;
    $section = $row['section'] ?? null;
    $circuit = $row['circuit'] ?? null;
    $initialProcess = $row['initial_process'] ?? null;
    $secondaryProcess = $row['secondary_process'] ?? null;
    $productionGrp = $row['production_grp'] ?? null;
    $laterProcess = $row['later_process'] ?? null;
    $fullName = $row['added_by'] ?? null;

    // Validate the date
    if ($date === null) {
        echo "Invalid date format: " . htmlspecialchars($row['date']);
        continue;
    }

    // Parameters for the insert query
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
        $laterProcess,
        $fullName,
    ];

    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
}

echo "Data successfully saved.";

?>
