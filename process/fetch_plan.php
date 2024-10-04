<?php
// Include your database connection file
include 'conn.php';

// SQL query to fetch the data from selected_plan_date
$sql = "SELECT 
            [base_product],
            [line],
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

// Process the fetched data from selected_plan_date
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
            'line' => $row['line'],
        ];
    }

    // Assign values to the date key
    $data[$baseProduct][$date] = $value;
}

// Sort dates from recent to future (most recent first)
usort($dates, function($a, $b) {
    return strtotime($a) - strtotime($b); // Sort ascending (recent to future)
});

// Fetch additional data from plan_masterlist
$sqlMasterlist = "SELECT 
                        [car_model],
                        [main_product_no],
                        [car_code],
                        [code],
                        [base_product] 
                   FROM [live_mrcs_db].[dbo].[plan_masterlist]";
$resultMasterlist = sqlsrv_query($conn, $sqlMasterlist);
if (!$resultMasterlist) {
    die(print_r(sqlsrv_errors(), true));
}

// Initialize an array for the masterlist data
$masterlistData = [];
while ($row = sqlsrv_fetch_array($resultMasterlist, SQLSRV_FETCH_ASSOC)) {
    $masterlistData[$row['base_product']] = [
        'car_model' => $row['car_model'],
        'main_product_no' => $row['main_product_no'],
        'car_code' => $row['car_code'],
        'code' => $row['code'],
    ];
}

// HTML table header
echo "<table class='table table-sm table-head-fixed text-nowrap table-hover'>
        <thead>
            <tr>
                <th>Car Model</th>
                <th>Main Product No</th>
                <th>Car Code</th>
                <th>Code</th>
                <th>Base Product</th>
                <th>Line</th>";

// Generate table headers for each date
foreach ($dates as $date) {
    echo "<th>$date</th>";
}

echo "      <th>Total</th> <!-- Total column header -->
            </tr>
        </thead>
        <tbody>";

// Display pivoted data and align with masterlist data
// Display pivoted data and align with masterlist data
foreach ($data as $baseProduct => $rowData) {
    echo "<tr>";

    // Initialize total for the row
    $total = 0; 

    // Fetch masterlist data for the current base_product
    if (isset($masterlistData[$baseProduct])) {
        $masterlist = $masterlistData[$baseProduct];
        echo "<td>{$masterlist['car_model']}</td>
              <td>{$masterlist['main_product_no']}</td>
              <td>{$masterlist['car_code']}</td>
              <td>{$masterlist['code']}</td>";
    } else {
        // If no matching data, leave fields empty but still display base_product
        echo "<td colspan='4'></td>";
    }

    echo "<td>{$baseProduct}</td>
          <td>{$rowData['line']}</td>";

    // Display values for each date
    foreach ($dates as $date) {
        $value = isset($rowData[$date]) ? $rowData[$date] : '';
        echo "<td>{$value}"; // Display the value
        if (is_numeric($value)) {
            $total += $value; // Sum the total for numeric values
        }
        echo "</td>";
    }

    // Display the total value in red font color
    echo "<td style='color: red;'>" . ($total !== 0 ? $total : '') . "</td>";

    echo "</tr>";
}

echo "      </tbody>
    </table>";
?>
