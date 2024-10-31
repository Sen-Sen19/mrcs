<?php
// Database connection parameters
$serverName = "172.25.115.167\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "live_mrcs_db",
    "Uid" => "sa",
    "PWD" => '#Sy$temGr0^p|115167'
);

// Establish the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(json_encode(['error' => 'Connection failed: ' . print_r(sqlsrv_errors(), true)]));
}

// SQL query to get added_by values
$sql = "SELECT DISTINCT added_by FROM plan_2";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(json_encode(['error' => 'Database query failed: ' . print_r(sqlsrv_errors(), true)]));
}

$added_by_values = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $added_by_values[] = $row['added_by'];
}

// Free the statement and close the connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

// Return the result as a JSON array
header('Content-Type: application/json');
echo json_encode($added_by_values);
?>
