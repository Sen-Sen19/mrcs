<?php
// fetch_jph_data.php
include 'conn.php'; // Include your database connection file

$query = "SELECT TOP (1000) [process], [first_jph] FROM [live_mrcs_db].[dbo].[jph_masterlist]";
$result = sqlsrv_query($conn, $query);

$data = array();

if ($result) {
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $data[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($data);
?>
