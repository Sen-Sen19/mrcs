<?php

include 'conn.php';

$addedBy = isset($_SESSION['full_name']) ? $_SESSION['full_name'] : '';
$deleteSql = "DELETE FROM [live_mrcs_db].[dbo].[no_car_model] WHERE [added_by] = ?";
$deleteParams = array($addedBy);
$deleteResult = sqlsrv_query($conn, $deleteSql, $deleteParams);

if (!$deleteResult) {
    die(print_r(sqlsrv_errors(), true)); // Handle error if delete fails
}

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
    $carCode = isset($masterlistData[$baseProduct]) ? $masterlistData[$baseProduct]['car_code'] : null;

    // If car_model is not found, log it to the database and continue processing
    if ($carModel === null) {
        // Insert the missing base_product into the no_car_model table
        $insertSql = "INSERT INTO [live_mrcs_db].[dbo].[no_car_model] ([base_product], [added_by]) VALUES (?, ?)";
        $insertParams = array($baseProduct, $addedBy);
        $insertResult = sqlsrv_query($conn, $insertSql, $insertParams);

        if (!$insertResult) {
            die(print_r(sqlsrv_errors(), true)); // Handle error if insert fails
        }

        // Continue with the next base_product
        continue;
    }

    // Special case for Subaru Others, keep it as a separate car_model
    if ($carModel === 'Subaru' && $carCode === 'Subaru Others') {
        // Treat "Subaru Others" as a separate car_model
        $newCarModel = 'Subaru Others';

        if (!isset($groupedData[$newCarModel])) {
            $groupedData[$newCarModel] = [
                'base_product' => $baseProduct,
                'line' => $rowData['line'],
                'values' => [],
            ];
        }

        // Add values to "Subaru Others"
        foreach ($rowData['values'] as $date => $value) {
            $groupedData[$newCarModel]['values'][$date] = isset($groupedData[$newCarModel]['values'][$date]) 
                ? $groupedData[$newCarModel]['values'][$date] + $value 
                : $value;
        }
    } else {
        // Add normal car_model (including regular Subaru without "Others")
        if (!isset($groupedData[$carModel])) {
            $groupedData[$carModel] = [
                'base_product' => $baseProduct,
                'line' => $rowData['line'],
                'values' => [],
            ];
        }

        // Add values for normal car_model
        foreach ($rowData['values'] as $date => $value) {
            $groupedData[$carModel]['values'][$date] = isset($groupedData[$carModel]['values'][$date]) 
                ? $groupedData[$carModel]['values'][$date] + $value 
                : $value;
        }
    }
}

$firstMonth = date('Y-m', strtotime($dates[0]));
$secondMonth = date('Y-m', strtotime("+1 month", strtotime($firstMonth . "-01"))); 
$thirdMonth = date('Y-m', strtotime("+1 month", strtotime($secondMonth . "-01")));

echo "<table class='table table-sm table-head-fixed text-nowrap table-hover'>
        <thead>
            <tr>
                <th>Car Model</th>";

foreach ($dates as $date) {
    echo "<th>$date</th>";
}

echo "
<th style='color: red;'>Total</th>
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

    $total = 0;
    $maxPlan1 = 0; 
    $maxPlan1Date = ''; 

    $maxPlan2 = 0; 
    $maxPlan2Date = ''; 

    $maxPlan3 = 0; 
    $maxPlan3Date = ''; 

    foreach ($dates as $date) {
        $value = isset($rowData['values'][$date]) ? $rowData['values'][$date] : 0;
        echo "<td>{$value}</td>";
        $total += $value;

        // Check if the date belongs to the first month
        if (date('Y-m', strtotime($date)) === $firstMonth) {
            if ($value > $maxPlan1) {
                $maxPlan1 = $value;
                $maxPlan1Date = $date;
            }
        }

        // Check if the date belongs to the second month
        if (date('Y-m', strtotime($date)) === $secondMonth) {
            if ($value > $maxPlan2) {
                $maxPlan2 = $value;
                $maxPlan2Date = $date;
            }
        }

        // Check if the date belongs to the third month
        if (date('Y-m', strtotime($date)) === $thirdMonth) {
            if ($value > $maxPlan3) {
                $maxPlan3 = $value;
                $maxPlan3Date = $date;
            }
        }
    }

    echo "
      <td style='color: red;'>{$total}</td>
      <td style='color: blue;'>{$maxPlan1}</td>
      <td style='color: blue;'>{$maxPlan1Date}</td>
      <td style='color: green;'>{$maxPlan2}</td>
      <td style='color: green;'>{$maxPlan2Date}</td>
      <td style='color: purple;'>{$maxPlan3}</td>
      <td style='color: purple;'>{$maxPlan3Date}</td>
      </tr>";
}

echo "  </tbody>
      </table>";
?>
