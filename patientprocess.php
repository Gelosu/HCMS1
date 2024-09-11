<?php
include 'connect.php'; // Include database connection

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $p_id = $_POST['p_id'];
    $p_name = $_POST['p_name'];
    $p_age = $_POST['p_age'];
    $p_bday = $_POST['p_bday'];
    $p_address = $_POST['p_address'];
    $p_contper = $_POST['p_contper'];
    $p_type = $_POST['p_type'];

    // Prepare and execute insert query
    $sql = "INSERT INTO patient (p_id, p_name, p_age, p_bday, p_address, p_contper, p_type) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $p_id, $p_name, $p_age, $p_bday, $p_address, $p_contper, $p_type);

    if ($stmt->execute()) {
        // Redirect back to the admin panel after successful insert
        header("Location: patientlist.php");
        exit();
    } else {
        // Check for duplicate entry error
        if ($conn->errno == 1062) {
            // Display JavaScript alert
            echo "<script>alert('The data already exists!');</script>";
        } else {
            // Display generic error message
            echo "<script>alert('An error occurred while processing your request. Please try again later.');</script>";
        }
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
