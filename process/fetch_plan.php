<?php
// Include your database connection file
include 'conn.php';

// SQL query to fetch the data
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
            [car_model],
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
            [date],
            [value]
        FROM [live_mrcs_db].[dbo].[selected_plan_date]";

$result = sqlsrv_query($conn, $sql);
if (!$result) {
    die(print_r(sqlsrv_errors(), true));
}

// Initialize arrays to store the pivoted data
$data = [];
$dates = [];

// Process the fetched data
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    $baseProduct = $row['base_product'];
    $date = $row['date']->format('Y-m-d');
    $value = $row['value'];

    // Create a unique date list
    if (!in_array($date, $dates)) {
        $dates[] = $date;
    }

    // Populate the pivoted data structure
    if (!isset($data[$baseProduct])) {
        $data[$baseProduct] = [
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
            'car_model' => $row['car_model'],
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
        ];
    }

    // Assign values to the date key
    $data[$baseProduct][$date] = $value;
}

// Sort dates from recent to future (most recent first)
usort($dates, function($a, $b) {
    return strtotime($a) - strtotime($b); // Sort ascending (recent to future)
});

// HTML table header
echo "<table class='table table-sm table-head-fixed text-nowrap table-hover'>
        <thead>
            <tr>
                <th>Base Product</th>
                <th>Manufacturing Location</th>
                <th>Customer Manufacturer</th>
                <th>Shipping Location</th>
                <th>Vehicle Type</th>
                <th>Vehicle Type Name</th>
                <th>Warehouse Type</th>
                <th>Warehouse Type Name</th>
                <th>Assembly Group Name</th>
                <th>Item</th>
                <th>Internal Item Number</th>
                <th>Car Model</th>
                <th>Line</th>
                <th>Poly Size</th>
                <th>Capacity</th>";

// Generate table headers for each date
foreach ($dates as $date) {
    echo "<th>$date</th>";
}

echo "      <th>Total</th> <!-- Total column header -->
        </tr>
        </thead>
        <tbody>";

// Display pivoted data
foreach ($data as $baseProduct => $rowData) {
    echo "<tr>
            <td>{$baseProduct}</td>
            <td>{$rowData['manufacturing_location']}</td>
            <td>{$rowData['customer_manufacturer']}</td>
            <td>{$rowData['shipping_location']}</td>
            <td>{$rowData['vehicle_type']}</td>
            <td>{$rowData['vehicle_type_name']}</td>
            <td>{$rowData['wh_type']}</td>
            <td>{$rowData['wh_type_name']}</td>
            <td>{$rowData['assy_group_name']}</td>
            <td>{$rowData['item']}</td>
            <td>{$rowData['internal_item_number']}</td>
            <td>{$rowData['car_model']}</td>
            <td>{$rowData['line']}</td>
            <td>{$rowData['poly_size']}</td>
            <td>{$rowData['capacity']}</td>";

    $total = 0; // Initialize total for the row

    // Display values for each date
    foreach ($dates as $date) {
        $value = isset($rowData[$date]) ? $rowData[$date] : '';
        echo "<td>{$value}"; // Display the value
        if (is_numeric($value)) {
            $total += $value; // Sum the total for numeric values
        }
        echo "</td>";
    }

    echo "<td style='color: red;'>$total</td> <!-- Total value in red font color -->";
    echo "</tr>";
}

echo "      </tbody>
    </table>";
?>
