<?php
include 'conn.php';

$sql = "SELECT 
    product,
    car_model,
    base_product,
    car_code,
    block,
    class,
    line_no,
    circuit_qty,
   airbag_housing,
cap_insertion,
shieldwire_taping,
gomusen_insertion,
point_marking,
looping,
shikakari_handler,
black_taping,
components_insertion
    FROM non_machine_process";

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

header('Content-Type: text/csv');

header('Content-Disposition: attachment; filename="Non_Machine_Process_' . date("Y-m-d") . '.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, [
    'Product',
    'Car Model',
    'Base Product',
    'Car Code',
    'Block',
    'Class',
    'Line No',
    'Circuit Qty',
    'Airbarg Housing',
    'Cap insertion',
    'Shieldwire Taping',
    'Gomusen Insertion',
    'Point Marking',
    'Looping',
    'Shikakari Handler',
    'Black Taping',
    'Components Insertion'

]);


while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {

    foreach ($row as $key => $value) {

        if ($value === null) {
            $row[$key] = '';
        }
    }


    fputcsv($output, $row);
}


fclose($output);
exit();
?>