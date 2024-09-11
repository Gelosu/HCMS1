<?php
// Include database connection
include 'connect.php';

// Check if the medicine ID is provided
if (isset($_GET['id'])) {
    // Sanitize the medicine ID
    $medicine_id = $_GET['id'];

    // Prepare the SQL statement to delete the medicine record
    $sql = "DELETE FROM inv_meds WHERE med_id = '$medicine_id'";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the admin panel with a success message
        header("Location: admin.php?success=1");
        exit();
    } else {
        // Redirect back to the admin panel with an error message
        header("Location: admin.php?error=" . urlencode($conn->error));
        exit();
    }
} else {
    // Redirect back to the admin panel if medicine ID is not provided
    header("Location: meds.php");
    exit();
}

// Close database connection
$conn->close();
?>
