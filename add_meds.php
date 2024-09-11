<?php
// Include database connection
include 'connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $medName = $_POST["medName"];
    $medDesc = $_POST["medDesc"];
    $stockIn = $_POST["stockIn"];
    $stockOut = $_POST["stockOut"];
    $stockExp = $_POST["stockExp"];
    $stockAvail = $_POST["stockAvail"];

    // Prepare SQL statement to insert data into the inv_meds table
    $sql = "INSERT INTO inv_meds (meds_name, med_dscrptn, stock_in, stock_out, stock_exp, stock_avail) 
            VALUES ('$medName', '$medDesc', '$stockIn', '$stockOut', '$stockExp', '$stockAvail')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
