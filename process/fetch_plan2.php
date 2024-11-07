<?php

include 'conn.php';

$addedBy = isset($_SESSION['full_name']) ? $_SESSION['full_name'] : '';

$sql = "SELECT 
            [base_product],
            [line],
            [date],
            [value]
        FROM [live_mrcs_db].[dbo].[selected_plan_date]
        WHERE [added_by] = ?";

$params = array($addedBy);
$result = sqlsrv_query($conn, $sql, $params);

if (!$result) {
    die(print_r(sqlsrv_errors(), true));
}

$data = [];
$dates = [];

while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    $baseProduct = $row['base_product'];

    if ($row['date'] !== null) {
        $date = $row['date']->format('Y-m-d');
    } else {
        continue;
    }
    $value = $row['value'];

    if (!in_array($date, $dates)) {
        $dates[] = $date;
    }

    if (!isset($data[$baseProduct])) {
        $data[$baseProduct] = [
            'line' => $row['line'],
            'values' => [],
        ];
    }

    $data[$baseProduct]['values'][$date] = isset($data[$baseProduct]['values'][$date]) 
        ? $data[$baseProduct]['values'][$date] + $value 
        : $value;
}

usort($dates, function($a, $b) {
    return strtotime($a) - strtotime($b); 
});

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

$masterlistData = [];
while ($row = sqlsrv_fetch_array($resultMasterlist, SQLSRV_FETCH_ASSOC)) {
    $masterlistData[$row['base_product']] = [
        'car_model' => $row['car_model'],
        'main_product_no' => $row['main_product_no'],
        'car_code' => $row['car_code'],
        'code' => $row['code'],
    ];
}

$groupedData = [];
foreach ($data as $baseProduct => $rowData) {
    // Check if the base_product exists in the master list
    $carModel = isset($masterlistData[$baseProduct]) ? $masterlistData[$baseProduct]['car_model'] : null;
    
    // If car_model is not found, log it to the console
    if ($carModel === null) {
        echo "<script>console.log('Unknown base_product: {$baseProduct}');</script>";
        continue;  // Skip processing this base_product for the table
    }
    
    if (!isset($groupedData[$carModel])) {
        $groupedData[$carModel] = [
            'base_product' => $baseProduct,
            'line' => $rowData['line'],
            'values' => [],
        ];
    }

    foreach ($rowData['values'] as $date => $value) {
        if (!isset($groupedData[$carModel]['values'][$date])) {
            $groupedData[$carModel]['values'][$date] = 0;
        }
        $groupedData[$carModel]['values'][$date] += $value;
    }
}

// Identify the first, second, and third months based on the available dates
$firstMonth = date('Y-m', strtotime($dates[0])); // Get the year-month from the earliest date
$secondMonth = date('Y-m', strtotime("+1 month", strtotime($firstMonth . "-01"))); // One month after the first month
$thirdMonth = date('Y-m', strtotime("+1 month", strtotime($secondMonth . "-01"))); // One month after the second month

echo "<table class='table table-sm table-head-fixed text-nowrap table-hover'>
        <thead>
            <tr>
                <th>Car Model</th>";

foreach ($dates as $date) {
    echo "<th>$date</th>";
}

// Adding new columns without any dynamic calculations
echo "
<th style='color: red;'>Total</th>
<th>Max Plan 1</th>
<th>First Month</th>
<th>Max Plan 2</th>
<th>Second Month</th>
<th>Max Plan 3</th>
<th>Third Month</th>
            </tr>
        </thead>
        <tbody>";

foreach ($groupedData as $carModel => $rowData) {
    echo "<tr>";
    echo "<td>{$carModel}</td>";

    $total = 0;
    $maxPlan1 = 0; // Variable to store max value for the first month
    $maxPlan1Date = ''; // Variable to store the date for the max value in the first month

    $maxPlan2 = 0; // Variable to store max value for the second month
    $maxPlan2Date = ''; // Variable to store the date for the max value in the second month

    $maxPlan3 = 0; // Variable to store max value for the third month
    $maxPlan3Date = ''; // Variable to store the date for the max value in the third month

    foreach ($dates as $date) {
        $value = isset($rowData['values'][$date]) ? $rowData['values'][$date] : 0;
        echo "<td>{$value}</td>";
        $total += $value;

        // Check if the date belongs to the first month
        if (date('Y-m', strtotime($date)) === $firstMonth) {
            // Update maxPlan1 and store the corresponding date if a higher value is found
            if ($value > $maxPlan1) {
                $maxPlan1 = $value;
                $maxPlan1Date = $date; // Store the date for the max value in the first month
            }
        }

        // Check if the date belongs to the second month
        if (date('Y-m', strtotime($date)) === $secondMonth) {
            // Update maxPlan2 and store the corresponding date if a higher value is found
            if ($value > $maxPlan2) {
                $maxPlan2 = $value;
                $maxPlan2Date = $date; // Store the date for the max value in the second month
            }
        }

        // Check if the date belongs to the third month
        if (date('Y-m', strtotime($date)) === $thirdMonth) {
            // Update maxPlan3 and store the corresponding date if a higher value is found
            if ($value > $maxPlan3) {
                $maxPlan3 = $value;
                $maxPlan3Date = $date; // Store the date for the max value in the third month
            }
        }
    }

    // Adding placeholder values for the new columns
    echo "
      <td style='color: red;'>{$total}</td>
      <td>{$maxPlan1}</td>
      <td>{$maxPlan1Date}</td> <!-- Display the date for the max value in the first month -->
      <td>{$maxPlan2}</td>
      <td>{$maxPlan2Date}</td> <!-- Display the date for the max value in the second month -->
      <td>{$maxPlan3}</td>
      <td>{$maxPlan3Date}</td> <!-- Display the date for the max value in the third month -->
      </tr>";
}

echo "  </tbody>
      </table>";

?>
