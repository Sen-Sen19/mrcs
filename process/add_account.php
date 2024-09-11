<?php
include 'conn.php'; // Include your database connection

header('Content-Type: application/json');

if (!$conn) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch the next available ID
    $sql = "SELECT MAX(ID) AS maxID FROM [live_mrcs_db].[dbo].[account]";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(['success' => false, 'error' => sqlsrv_errors()]);
        exit();
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $nextID = ($row['maxID'] ?? 0) + 1; // Calculate the next ID, default to 1 if no records

    echo json_encode(['success' => true, 'nextID' => $nextID]);

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle adding a new account
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $type = $_POST['Type'];

    // Assuming auto-increment ID, you don't need to include the ID in the insert query
    $sql = "INSERT INTO [live_mrcs_db].[dbo].[account] ([Username], [Password], [Type]) 
            VALUES (?, ?, ?)";

    $params = array($username, $password, $type);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(['success' => false, 'error' => sqlsrv_errors()]);
    } else {
        echo json_encode(['success' => true]);
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
