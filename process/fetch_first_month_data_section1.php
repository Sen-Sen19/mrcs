<?php
// fetch_first_month_data.php

include 'conn.php'; // Include your database connection file

header('Content-Type: application/json');

$car_model = 'suzuki old'; // Adjust the car model as needed

$query = "
    SELECT 
        ts.[process],
        COALESCE(jml.[first_jph], 0) AS [first_jph]
    FROM 
        [live_mrcs_db].[dbo].[total_shots] ts
    LEFT JOIN 
        [live_mrcs_db].[dbo].[jph_masterlist] jml
    ON 
        ts.[process] = jml.[process]
    WHERE 
        ts.[car_model] = '$car_model'
";

$result = sqlsrv_query($conn, $query); // Assuming $conn is your database connection

$data = array();

if ($result) {
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $data[] = $row;
    }
}

echo json_encode($data);
?>
