<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['medId'])) {
    $medId = $_POST['medId'];
    $supplyName = $_POST['supplyName'];
    $stockOut = $_POST['stockOut'];
    $stockExp = $_POST['stockExp'];
    $stockAvail = $_POST['stockAvail'];

    // Update the record in the database
    $sql = "UPDATE inv_medsup SET 
                prod_name = ?, 
                stck_out = ?, 
                stck_expired = ?, 
                stck_avl = ? 
            WHERE med_supId = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiii", $supplyName, $stockOut, $stockExp, $stockAvail, $medId);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
