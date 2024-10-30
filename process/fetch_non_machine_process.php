<?php
// combine.php

// Database connection settings
$serverName = "172.25.115.167\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "live_mrcs_db",
    "Uid" => "sa",
    "PWD" => '#Sy$temGr0^p|115167'
);

$conn = sqlsrv_connect($serverName, $connectionOptions);


if ($conn === false) {
    error_log("SQLSRV Connection Error: " . print_r(sqlsrv_errors(), true), 3, '/var/log/sql_errors.log'); // Change path as needed
    die("Database connection failed.");
}


$sql = "
    SELECT 

    np.[base_product],
    np.[car_model],
    np.[product],
    np.[car_code],
    np.[block],
    np.[class],
    np.[line_no],
    np.[circuit_qty],
np.[airbag_housing],
np.[cap_insertion],
np.[shieldwire_taping],
np.[gomusen_insertion],
np.[point_marking],
np.[looping],
np.[shikakari_handler],
np.[black_taping],
np.[components_insertion]


    FROM [live_mrcs_db].[dbo].[non_machine_process] AS np
";

$stmt = sqlsrv_query($conn, $sql);


if ($stmt === false) {
    error_log("SQLSRV Query Error: " . print_r(sqlsrv_errors(), true), 3, '/var/log/sql_errors.log'); // Change path as needed
    die("Query execution failed.");
}


$data = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}


sqlsrv_close($conn);

header('Content-Type: application/json');
echo json_encode($data);
?>
