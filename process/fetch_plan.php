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
        ];
    }

    $data[$baseProduct][$date] = $value;
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

// Query to retrieve data from the total_plan table based on the added_by value
$sqlTotalPlan = "SELECT 
                    [car_code], 
                    [max_plan_1],
                    [max_plan_2], 
                    [max_plan_3] 
                 FROM [live_mrcs_db].[dbo].[total_plan] 
                 WHERE [added_by] = ?"; // Ensure to filter by added_by

$paramsTotalPlan = array($addedBy);
$resultTotalPlan = sqlsrv_query($conn, $sqlTotalPlan, $paramsTotalPlan);

if (!$resultTotalPlan) {
    die(print_r(sqlsrv_errors(), true));
}

$totalPlanData = [];
while ($row = sqlsrv_fetch_array($resultTotalPlan, SQLSRV_FETCH_ASSOC)) {
    $totalPlanData[$row['car_code']] = [
        'max_plan_1' => $row['max_plan_1'],
        'max_plan_2' => $row['max_plan_2'],
        'max_plan_3' => $row['max_plan_3'],
    ];
}

$matchingResults = [];

foreach ($masterlistData as $baseProduct => $masterlist) {
    if (isset($totalPlanData[$masterlist['car_model']])) {
        $matchingResults[$baseProduct] = $totalPlanData[$masterlist['car_model']];
    }
}

// Sort data so that rows without car_model come first
uksort($data, function($a, $b) use ($masterlistData) {
    $hasCarModelA = isset($masterlistData[$a]['car_model']) && !empty($masterlistData[$a]['car_model']);
    $hasCarModelB = isset($masterlistData[$b]['car_model']) && !empty($masterlistData[$b]['car_model']);
    // Put rows without car_model first
    if (!$hasCarModelA && $hasCarModelB) {
        return -1;
    } elseif ($hasCarModelA && !$hasCarModelB) {
        return 1;
    }
    return 0;
});

echo "<table class='table table-sm table-head-fixed text-nowrap table-hover'>
        <thead>
            <tr>
                <th>Car Model</th>
                <th>Base Product</th>
                <th>Car Code</th>
                <th>Code</th>
                <th>Main Product No</th>
                <th>Line</th>";

foreach ($dates as $date) {
    echo "<th>$date</th>";
}
echo "<th style='color: red;'>Total</th> 
      <th style='color: blue;'>Max Plan 1</th>
      <th style='color: blue;'>First Month</th>
      <th style='color: green;'>Max Plan 2</th>
      <th style='color: green;'>Second Month</th>
      <th style='color: purple;'>Max Plan 3</th>
      <th style='color: purple;'>Third Month</th>
            </tr>
        </thead>
        <tbody>";

foreach ($data as $baseProduct => $rowData) {
    echo "<tr>";

    $total = 0; 

    if (isset($masterlistData[$baseProduct])) {
        $masterlist = $masterlistData[$baseProduct];
        echo "<td>{$masterlist['car_model']}</td>
              <td>{$masterlist['main_product_no']}</td>
              <td>{$masterlist['car_code']}</td>
              <td>{$masterlist['code']}</td>";
    } else {
        echo "<td colspan='4'></td>"; 
    }

    echo "<td>{$baseProduct}</td>
          <td>{$rowData['line']}</td>";
    
    $firstMonthValue = ''; 
    $secondMonthValue = '';
    $thirdMonthValue = '';

    $maxPlan1Date = isset($matchingResults[$baseProduct]['max_plan_1']) ? $matchingResults[$baseProduct]['max_plan_1'] : '';
    $maxPlan2Date = isset($matchingResults[$baseProduct]['max_plan_2']) ? $matchingResults[$baseProduct]['max_plan_2'] : '';
    $maxPlan3Date = isset($matchingResults[$baseProduct]['max_plan_3']) ? $matchingResults[$baseProduct]['max_plan_3'] : '';

    if ($maxPlan1Date) {
        $maxPlan1DateFormatted = date('Y-m-d', strtotime($maxPlan1Date)); 
        $firstMonthValue = isset($rowData[$maxPlan1DateFormatted]) ? $rowData[$maxPlan1DateFormatted] : '';
    }

    if ($maxPlan2Date) {
        $maxPlan2DateFormatted = date('Y-m-d', strtotime($maxPlan2Date));
        $secondMonthValue = isset($rowData[$maxPlan2DateFormatted]) ? $rowData[$maxPlan2DateFormatted] : ''; 
    }

    if ($maxPlan3Date) {
        $maxPlan3DateFormatted = date('Y-m-d', strtotime($maxPlan3Date)); 
        $thirdMonthValue = isset($rowData[$maxPlan3DateFormatted]) ? $rowData[$maxPlan3DateFormatted] : ''; 
    }

    // Display values for each date
    foreach ($dates as $date) {
        $value = isset($rowData[$date]) ? $rowData[$date] : '';
        echo "<td>{$value}"; // Display the value
        if (is_numeric($value)) {
            $total += $value; // Sum the total for numeric values
        }
        echo "</td>";
    }

    echo "<td style='color: red;'>" . ($total !== 0 ? $total : '') . "</td>";

    echo "<td style='color: blue;'>{$maxPlan1Date}</td>"; 
    echo "<td style='color: blue;'>{$firstMonthValue}</td>"; 
    echo "<td style='color: green;'>{$maxPlan2Date}</td>"; 
    echo "<td style='color: green;'>{$secondMonthValue}</td>"; 
    echo "<td style='color: purple;'>{$maxPlan3Date}</td>"; 
    echo "<td style='color: purple;'>{$thirdMonthValue}</td>"; 

    echo "</tr>";
}

echo "</tbody></table>";
?>
