<?php
// Check if the request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include 'connect.php';

    // Get the supply ID from POST request
    $medSupId = $_POST['medSupId'];

    // Prepare SQL delete query with placeholder
    $sql = "DELETE FROM inv_medsup WHERE med_supId = ?";

    // Prepare and bind parameters to the SQL statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the medSupId parameter (integer)
        $stmt->bind_param("i", $medSupId);

        // Execute the delete query
        if ($stmt->execute()) {
            // Return success message
            echo "Record deleted successfully";
        } else {
            // Return error message
            echo "Error deleting record: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Handle the error if statement preparation fails
        echo "Error preparing statement: " . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    // If the request is not POST, redirect to an error page
    header("Location: error.php");
    exit();
}
?>
