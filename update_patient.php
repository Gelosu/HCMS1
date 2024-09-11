<?php
include 'connect.php'; // Include database connection

// Check if $conn is valid before proceeding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $patient_id = $_POST['patient_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $bday = $_POST['bday'];
    $address = $_POST['address'];
    $contact_person = $_POST['contact_person'];
    $type = $_POST['type'];

    // Prepare and execute update query
    $stmt = $conn->prepare("UPDATE patient SET p_name=?, p_age=?, p_bday=?, p_address=?, p_contper=?, p_type=? WHERE p_id=?");
    $stmt->bind_param("ssssssi", $name, $age, $bday, $address, $contact_person, $type, $patient_id);

    if ($stmt->execute()) {
        // Redirect back to the admin panel after successful update
        header("Location: admin.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
