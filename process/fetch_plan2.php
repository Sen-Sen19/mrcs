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

$sqlTotalPlan = "SELECT 
                    [car_code], 
                    [first_month],
                    [second_month], 
                    [third_month] 
                FROM [live_mrcs_db].[dbo].[total_plan]"; 
$resultTotalPlan = sqlsrv_query($conn, $sqlTotalPlan);
if (!$resultTotalPlan) {
    die(print_r(sqlsrv_errors(), true));
}

$totalPlanData = [];
while ($row = sqlsrv_fetch_array($resultTotalPlan, SQLSRV_FETCH_ASSOC)) {
    $totalPlanData[$row['car_code']] = [
        'first_month' => $row['first_month'],
        'second_month' => $row['second_month'],
        'third_month' => $row['third_month'],
    ];
}

$matchingResults = [];
foreach ($masterlistData as $baseProduct => $masterlist) {
    if (isset($totalPlanData[$masterlist['car_model']])) {
        $matchingResults[$baseProduct] = $totalPlanData[$masterlist['car_model']];
    }
}

// ... (your existing code)

// Group data by car_model
$groupedData = [];
foreach ($data as $baseProduct => $rowData) {
    $carModel = $masterlistData[$baseProduct]['car_model'] ?? 'Unknown';
    
    if (!isset($groupedData[$carModel])) {
        $groupedData[$carModel] = [
            'base_product' => $baseProduct,
            'line' => $rowData['line'],
            'values' => [],
            'first_month_max' => 0, // Initialize max value for first month
            'first_month_date' => '', // Store date for max value
            'second_month_max' => 0, // Initialize max value for second month
            'second_month_date' => '', // Store date for max value
            'third_month_max' => 0, // Initialize max value for third month
            'third_month_date' => '', // Store date for max value
        ];
    }

    // Sum values for each date
    foreach ($rowData['values'] as $date => $value) {
        if (!isset($groupedData[$carModel]['values'][$date])) {
            $groupedData[$carModel]['values'][$date] = 0;
        }
        $groupedData[$carModel]['values'][$date] += $value;
    }
}

// Determine the first month and subsequent months
$firstMonthDateKey = $dates[0]; // First date in $dates is the first month
$firstMonthEndDate = date('Y-m-t', strtotime($firstMonthDateKey)); // Last date of the first month
$secondMonthDateKey = date('Y-m-01', strtotime('+1 month', strtotime($firstMonthDateKey))); // First date of the second month
$secondMonthEndDate = date('Y-m-t', strtotime($secondMonthDateKey)); // Last date of the second month
$thirdMonthDateKey = date('Y-m-01', strtotime('+2 months', strtotime($firstMonthDateKey))); // First date of the third month
$thirdMonthEndDate = date('Y-m-t', strtotime($thirdMonthDateKey)); // Last date of the third month

// Iterate through grouped data to find max values for each month
foreach ($groupedData as $carModel => &$rowData) {
    // Initialize variables for highest values and their dates
    $highestValueFirst = 0;
    $highestDateFirst = '';
    $highestValueSecond = 0;
    $highestDateSecond = '';
    $highestValueThird = 0;
    $highestDateThird = '';

    // Iterate through the values to find highest values for each month
    foreach ($rowData['values'] as $date => $value) {
        // Check for first month
        if ($date >= $firstMonthDateKey && $date <= $firstMonthEndDate) {
            if ($value > $highestValueFirst) {
                $highestValueFirst = $value; // Update highest value for first month
                $highestDateFirst = $date; // Update the date of the highest value
            }
        }

        // Check for second month
        if ($date >= $secondMonthDateKey && $date <= $secondMonthEndDate) {
            if ($value > $highestValueSecond) {
                $highestValueSecond = $value; // Update highest value for second month
                $highestDateSecond = $date; // Update the date of the highest value
            }
        }

        // Check for third month
        if ($date >= $thirdMonthDateKey && $date <= $thirdMonthEndDate) {
            if ($value > $highestValueThird) {
                $highestValueThird = $value; // Update highest value for third month
                $highestDateThird = $date; // Update the date of the highest value
            }
        }
    }

    // Store the highest values and their dates
    $rowData['first_month_max'] = $highestValueFirst;
    $rowData['first_month_date'] = $highestDateFirst ?: 'N/A'; // Set to 'N/A' if no date found
    $rowData['second_month_max'] = $highestValueSecond;
    $rowData['second_month_date'] = $highestDateSecond ?: 'N/A'; // Set to 'N/A' if no date found
    $rowData['third_month_max'] = $highestValueThird;
    $rowData['third_month_date'] = $highestDateThird ?: 'N/A'; // Set to 'N/A' if no date found
}

// Display the table
echo "<table class='table table-sm table-head-fixed text-nowrap table-hover'>
        <thead>
            <tr>
                <th>Car Model</th>";

foreach ($dates as $date) {
    echo "<th>$date</th>";
}
echo "       <th style='color: red;'>Total</th> 
            <th style='color: blue;'>Max Plan 1</th>
            <th style='color: blue;'>First Month</th>
            <th style='color: green;'>Max Plan 2</th>
            <th style='color: green;'>Second Month</th>
            <th style='color: purple;'>Max Plan 3</th>
            <th style='color: purple;'>Third Month</th>
            </tr>
        </thead>
        <tbody>";

foreach ($groupedData as $carModel => $rowData) {
    echo "<tr>";
    echo "<td>{$carModel}</td>";

    $total = 0; // Initialize total for the row
    foreach ($dates as $date) {
        $value = isset($rowData['values'][$date]) ? $rowData['values'][$date] : 0;
        echo "<td>{$value}</td>"; // Display the summed value
        $total += $value; // Update total
    }

    // Display values for Max Plan 1, Max Plan 2, Max Plan 3, and other columns
    echo "<td style='color: red;'>{$total}</td>
          <td style='color: blue;'>{$rowData['first_month_max']}</td>
          <td style='color: blue;'>{$rowData['first_month_date']}</td>
          <td style='color: green;'>{$rowData['second_month_max']}</td>
          <td style='color: green;'>{$rowData['second_month_date']}</td>
          <td style='color: purple;'>{$rowData['third_month_max']}</td>
          <td style='color: purple;'>{$rowData['third_month_date']}</td>
          </tr>";
}

echo "  </tbody>
      </table>";


?>
