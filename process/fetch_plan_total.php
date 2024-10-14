<?php
// Include your database connection file
include 'conn.php';

// Fetch data from the total_plan table
$query = "SELECT car_code, first_month, max_plan_1, second_month, max_plan_2, third_month, max_plan_3 FROM total_plan";
$result = sqlsrv_query($conn, $query);

// Check if the result is not empty and display the data
if ($result !== false && sqlsrv_has_rows($result)) {
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['car_code']) . "</td>";

    
        $first_month_style = ($row['first_month'] !== null && $row['first_month'] != 0) ? "color: red;" : "color: black;";
        echo "<td style='$first_month_style'>" . htmlspecialchars($row['first_month']) . "</td>";


        $max_plan_1_style = ($row['max_plan_1'] !== null && $row['max_plan_1'] != 0) ? "color: red;" : "color: black;";
        echo "<td style='$max_plan_1_style'>" . htmlspecialchars($row['max_plan_1']) . "</td>";


        $second_month_style = ($row['second_month'] !== null && $row['second_month'] != 0) ? "color: blue;" : "color: black;";
        $max_plan_2_style = ($row['max_plan_2'] !== null && $row['max_plan_2'] != 0) ? "color: blue;" : "color: black;";
        echo "<td style='$second_month_style'>" . htmlspecialchars($row['second_month']) . "</td>";
        echo "<td style='$max_plan_2_style'>" . htmlspecialchars($row['max_plan_2']) . "</td>";

        
        $third_month_style = ($row['third_month'] !== null && $row['third_month'] != 0) ? "color: green;" : "color: black;";
        $max_plan_3_style = ($row['max_plan_3'] !== null && $row['max_plan_3'] != 0) ? "color: green;" : "color: black;";
        echo "<td style='$third_month_style'>" . htmlspecialchars($row['third_month']) . "</td>";
        echo "<td style='$max_plan_3_style'>" . htmlspecialchars($row['max_plan_3']) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No data available</td></tr>";
}


sqlsrv_close($conn);
?>
