<?php
$serverName = "172.25.115.167\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "live_mrcs_db",
    "Uid" => "sa",
    "PWD" => '#Sy$temGr0^p|115167'
);

// Connect to the SQL Server database
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check the connection
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Query to fetch account data from the database
$sql = "SELECT emp_id, full_name, username, department, type FROM accounts";
$query = sqlsrv_query($conn, $sql);

// Fetch all the results
$accounts = array();
while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
    $accounts[] = $row;
}

// Get the logged-in employee's ID (this should be set from session or authentication)
$loggedInEmpId = $_SESSION['logged_in_emp_id'];  // Assuming the employee ID is stored in the session

// Return the accounts as a JSON response
echo json_encode($accounts);

// Close the database connection
sqlsrv_close($conn);
?>
