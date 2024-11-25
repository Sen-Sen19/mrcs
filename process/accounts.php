<?php

include 'conn.php';

header('Content-Type: application/json');

$search = isset($_GET['search']) ? $_GET['search'] : '';

try {
    // Select specific columns from the account table
    $sql = "SELECT emp_id, full_name, username, department, password, type FROM account";

    if (!empty($search)) {
        // Add a WHERE clause for the search term
        $sql .= " WHERE username LIKE ?";
        $searchTerm = "%$search%";
        $params = array($searchTerm);
    } else {
        $params = array();
    }

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        throw new Exception('SQL query execution failed: ' . print_r(sqlsrv_errors(), true));
    }

    // Fetch data and prepare it for JSON response
    $data = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $row['Delete'] = ''; // Add a column for potential delete functionality
        $data[] = $row;
    }

    // Return data as JSON
    echo json_encode($data);

} catch (Exception $e) {
    // Handle exceptions
    http_response_code(500);
    echo json_encode(array('message' => 'Error fetching data: ' . $e->getMessage()));
}

// Close connection
sqlsrv_close($conn);
?>
