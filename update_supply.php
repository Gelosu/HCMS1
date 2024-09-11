New! Keyboard shortcuts … Drive keyboard shortcuts have been updated to give you first-letters navigation
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include 'connect.php';

    // Get form data from POST request
    $supplyId = $_POST['supplyId'];
    $supplyName = $_POST['supplyName'];
    $stockIn = $_POST['stockIn'];
    $stockOut = $_POST['stockOut'];
    $stockExpired = $_POST['stockExpired'];
    $stockAvailable = $_POST['stockAvailable'];

    // Prepare update query
    $sql = "UPDATE inv_medsup SET 
            prod_name = '$supplyName', 
            stck_in = '$stockIn', 
            stck_out = '$stockOut', 
            stck_expired = '$stockExpired', 
            stck_avl = '$stockAvailable' 
            WHERE med_supId = $supplyId";

    // Execute the update query
    if ($conn->query($sql) === TRUE) {
        // If update is successful, redirect to the inventory page
       
    } else {
        // If there is an error, display an error message
        echo "Error updating record: " . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    // If the form is not submitted via POST, redirect to an error page
    header("Location: error.php");
    exit();
}
?>