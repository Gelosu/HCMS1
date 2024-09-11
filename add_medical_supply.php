<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $supplyName = mysqli_real_escape_string($conn, $_POST['supplyName']);
    $stockIn = mysqli_real_escape_string($conn, $_POST['stockIn']);
    $stockOut = mysqli_real_escape_string($conn, $_POST['stockOut']);
    $stockExpired = mysqli_real_escape_string($conn, $_POST['stockExpired']);
    $stockAvailable = mysqli_real_escape_string($conn, $_POST['stockAvailable']);
    
    $sql = "INSERT INTO inv_medsup (prod_name, stck_in, stck_out, stck_expired, stck_avl) 
            VALUES ('$supplyName', '$stockIn', '$stockOut', '$stockExpired', '$stockAvailable')";
    
    if(mysqli_query($conn, $sql)){
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
