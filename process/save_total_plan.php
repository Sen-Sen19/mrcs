<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'conn.php'; // Include your database connection file

// Check if the POST request contains the car codes
if (isset($_POST['car_codes'])) {
    // Retrieve the car codes from the request
    $carCodes = $_POST['car_codes'];

    // Prepare an SQL statement for inserting car codes
    $stmt = $conn->prepare("INSERT INTO total_plan (car_code) VALUES (?)");
    
    // Loop through each car code and execute the prepared statement
    foreach ($carCodes as $carCode) {
        $stmt->bind_param("s", $carCode); // Bind the parameter
        $stmt->execute(); // Execute the query
    }
    
    // Close the statement
    $stmt->close();

    // Return a success response
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "No car codes provided."]);
}

// Close the database connection
$conn->close();
?>
