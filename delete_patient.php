<?php
// Check if delete request is sent
if(isset($_POST['delete_id'])) {
    // Include your database connection file
    include 'connect.php';

    // Get the ID of the patient to delete
    $delete_id = $_POST['delete_id'];
    
    // SQL query to delete the patient record
    $sql = "DELETE FROM patient WHERE p_id = $delete_id";
    
    if ($conn->query($sql) === TRUE) {
        // Success message
        echo "Record deleted successfully";
    } else {
        // Error message
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    // If delete_id is not set, return an error message
    echo "Error: delete_id parameter is not set";
}
?>
