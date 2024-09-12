<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medId = $_POST['medId'];
    $medName = $_POST['medName'];
    $medDesc = $_POST['medDesc'];
    $stockIn = $_POST['stockIn'];
    $stockOut = $_POST['stockOut'];
    $stockExp = $_POST['stockExp'];
    $stockAvail = $_POST['stockAvail'];

    $sql = "UPDATE inv_meds SET 
            meds_name='$medName', 
            med_dscrptn='$medDesc', 
            stock_in=$stockIn, 
            stock_out=$stockOut, 
            stock_exp=$stockExp, 
            stock_avail=$stockAvail 
            WHERE med_id=$medId";

    if ($conn->query($sql) === TRUE) {
        // Fetch updated data
        $sql = "SELECT * FROM inv_meds";
        $result = $conn->query($sql);

        $medicines = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $medicines[] = $row;
            }
        }

        echo json_encode($medicines);
    } else {
        echo json_encode(['error' => "Error: " . $conn->error]);
    }

    $conn->close();
}
?>
