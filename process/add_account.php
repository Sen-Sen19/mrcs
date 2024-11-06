<?php

require_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST['emp_id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    // Insert the new account
    $sql = "INSERT INTO account (emp_id, full_name, username, department, password, type) VALUES (?, ?, ?, ?, ?, ?)";
    $params = array($emp_id, $full_name, $username, $department, $password, $type);

    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt === false) {
        echo "Statement preparation error: " . print_r(sqlsrv_errors(), true);
    } else {
        if (sqlsrv_execute($stmt) === false) {
            echo "Execution error: " . print_r(sqlsrv_errors(), true);
        } else {
            echo "Account saved successfully. ";
            
            // Define a function to duplicate rows in a specified table
            function duplicateRows($conn, $table, $full_name) {
                $selectSQL = "SELECT car_model, process, process_name, machine_inventory, jph1, wt1, ot1, mp1, 
                                     jph2, wt2, ot2, mp2, jph3, wt3, ot3, mp3, 
                                     machine_requirements1, machine_requirements2, machine_requirements3
                              FROM $table 
                              WHERE added_by = 'original'";
                $selectStmt = sqlsrv_query($conn, $selectSQL);

                if ($selectStmt === false) {
                    echo "Error retrieving data from $table: " . print_r(sqlsrv_errors(), true);
                    return;
                }

                $insertSQL = "INSERT INTO $table 
                              (car_model, process, process_name, machine_inventory, jph1, wt1, ot1, mp1, 
                               jph2, wt2, ot2, mp2, jph3, wt3, ot3, mp3, 
                               machine_requirements1, machine_requirements2, machine_requirements3, added_by)
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                
                while ($row = sqlsrv_fetch_array($selectStmt, SQLSRV_FETCH_ASSOC)) {
                    $insertParams = array(
                        $row['car_model'], $row['process'], $row['process_name'], $row['machine_inventory'],
                        $row['jph1'], $row['wt1'], $row['ot1'], $row['mp1'],
                        $row['jph2'], $row['wt2'], $row['ot2'], $row['mp2'],
                        $row['jph3'], $row['wt3'], $row['ot3'], $row['mp3'],
                        $row['machine_requirements1'], $row['machine_requirements2'], $row['machine_requirements3'],
                        $full_name // Set `added_by` to the new account's full name
                    );

                    $insertStmt = sqlsrv_prepare($conn, $insertSQL, $insertParams);
                    if ($insertStmt === false || sqlsrv_execute($insertStmt) === false) {
                        echo "Error duplicating row in $table: " . print_r(sqlsrv_errors(), true);
                        break;
                    }
                }
                echo "Data duplicated successfully in $table. ";
            }

            duplicateRows($conn, "section_1", $full_name);

            duplicateRows($conn, "section_2", $full_name);

            duplicateRows($conn, "section_3", $full_name);

            duplicateRows($conn, "section_4", $full_name);

            duplicateRows($conn, "section_5", $full_name);

            duplicateRows($conn, "section_6", $full_name);

            duplicateRows($conn, "section_7", $full_name);

            duplicateRows($conn, "section_9", $full_name);

        }
    }
}
?>
