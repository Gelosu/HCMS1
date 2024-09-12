<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medName = $_POST['medName'];
    $medDesc = $_POST['medDesc'];
    $stockIn = $_POST['stockIn'];
    $stockOut = $_POST['stockOut'];
    $stockExp = $_POST['stockExp'];
    $stockAvail = $_POST['stockAvail'];

    $sql = "INSERT INTO inv_meds (meds_name, med_dscrptn, stock_in, stock_out, stock_exp, stock_avail)
            VALUES ('$medName', '$medDesc', $stockIn, $stockOut, $stockExp, $stockAvail)";

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
