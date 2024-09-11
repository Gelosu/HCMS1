<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adid = mysqli_real_escape_string($conn, $_POST['adid']);
    $adname = mysqli_real_escape_string($conn, $_POST['adname']);
    $adsurname = mysqli_real_escape_string($conn, $_POST['adsurname']);
    $adusername = mysqli_real_escape_string($conn, $_POST['adusername']);
    $adpass = mysqli_real_escape_string($conn, $_POST['adpass']);

    $sql = "UPDATE admin SET adname='$adname', adsurname='$adsurname', adpass='$adpass' WHERE adid='$adid'";
    if (mysqli_query($conn, $sql)) {
        echo "User updated successfully";
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
