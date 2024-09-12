<?php

include 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data from POST request
    $supplyId = $_POST['supplyId'];
    $supplyName = $_POST['supplyName'];
    $stockIn = $_POST['stockIn2'];
    $stockOut = $_POST['stockOut2'];
    $stockExpired = $_POST['stockExpired2'];
    $stockAvailable = $_POST['stockAvailable2'];

    // Prepare update query
    $sql = "UPDATE inv_medsup SET 
            prod_name = '$supplyName', 
            stck_in = '$stockIn', 
            stck_out = '$stockOut', 
            stck_expired = '$stockExpired', 
            stck_avl = '$stockAvailable' 
            WHERE med_supId = $supplyId";

    $response = [];

    // Execute the update query
    if ($conn->query($sql) === TRUE) {
        // Fetch all medical supplies after update
        $sql = "SELECT * FROM inv_medsup";
        $result = $conn->query($sql);

        $supplies = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $supplies[] = $row;
            }
        }

        // Set success response
        $response['data'] = $supplies;
        $response['success'] = true;
        $response['message'] = "Update successful.";
    } else {
        // Error during query execution
        $response['error'] = "Update failed: " . $conn->error;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);

    // Close the connection
    $conn->close();
}
?>