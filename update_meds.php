<?php
// Include database connection
include 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $medId = $_POST['medId'];
    $medName = $_POST['medName'];
    $medDesc = $_POST['medDesc'];
    $stockIn = $_POST['stockIn'];
    $stockOut = $_POST['stockOut'];
    $stockExp = $_POST['stockExp'];
    $stockAvail = $_POST['stockAvail'];

    // Prepare SQL statement to update medicine
    $sql = "UPDATE inv_meds SET meds_name='$medName', med_dscrptn='$medDesc', stock_in='$stockIn', stock_out='$stockOut', stock_exp='$stockExp', stock_avail='$stockAvail' WHERE med_id=$medId";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Redirect to the main page or display a success message
        header("Location:admin.php");
        exit();
    } else {
        // Handle the error, maybe redirect back to the form with an error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
