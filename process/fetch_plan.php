<?php

include 'conn.php';


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

echo "<table class='table table-sm table-head-fixed text-nowrap table-hover'>
        <thead>
            <tr>
                <th>Car Model</th>
                <th>Main Product No</th>
                <th>Car Code</th>
                <th>Code</th>
                <th>Base Product</th>
                <th>Line</th>";


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

    $maxPlan1Date = isset($matchingResults[$baseProduct]['first_month']) ? $matchingResults[$baseProduct]['first_month'] : '';
    $maxPlan2Date = isset($matchingResults[$baseProduct]['second_month']) ? $matchingResults[$baseProduct]['second_month'] : '';
    $maxPlan3Date = isset($matchingResults[$baseProduct]['third_month']) ? $matchingResults[$baseProduct]['third_month'] : '';

   
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

    // Display the total value in red font color
    echo "<td style='color: red;'>" . ($total !== 0 ? $total : '') . "</td>";


    echo "<td style='color: blue;'>{$maxPlan1Date}</td>"; 
    echo "<td style='color: blue;'>{$firstMonthValue}</td>"; 
    echo "<td style='color: green;'>{$maxPlan2Date}</td>"; 
    echo "<td style='color: green;'>{$secondMonthValue}</td>"; 
    echo "<td style='color: purple;'>{$maxPlan3Date}</td>"; 
    echo "<td style='color: purple;'>{$thirdMonthValue}</td>"; 

    echo "</tr>"; // End of table row
}

echo "  </tbody>
    </table>";

?>


