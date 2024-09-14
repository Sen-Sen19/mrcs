<?php
include 'conn.php'; 


function formatDate($date) {
    $d = DateTime::createFromFormat('Y-m-d', $date);
    if ($d && $d->format('Y-m-d') === $date) {
        return $date;
    } else {
        
        $d = DateTime::createFromFormat('Y/m/d', $date);
        if ($d) {
            return $d->format('Y-m-d');
        } else {
            return null; 
        }
    }
}


$data = json_decode(file_get_contents('php://input'), true);


$query = "INSERT INTO plan_from_pc (base_product, date, value, max_plan) VALUES (?, ?, ?, ?)";

foreach ($data as $row) {
    $baseProduct = $row['base_product'];
    $date = formatDate($row['date']);
    $value = $row['value'];
    $maxPlan = $row['max_plan']; 


    if ($date === null) {
        echo "Invalid date format: " . htmlspecialchars($row['date']);
        continue; 
    }

    $params = [$baseProduct, $date, $value, $maxPlan]; 
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
}

echo "Data successfully saved.";
?>
