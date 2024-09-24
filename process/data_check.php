<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$serverName = "172.25.115.167\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "live_mrcs_db",
    "Uid" => "sa",
    "PWD" => '#Sy$temGr0^p|115167'
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    echo json_encode(array("error" => sqlsrv_errors()));
    exit;
}

$sql = "SELECT COUNT(*) AS count FROM plan_from_pc";
$query = sqlsrv_query($conn, $sql);
if ($query === false) {
    echo json_encode(array("error" => sqlsrv_errors()));
    exit;
}

$row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
$dataExists = $row['count'] > 0;

sqlsrv_free_stmt($query);
sqlsrv_close($conn);

echo json_encode(array("dataExists" => $dataExists));
?>