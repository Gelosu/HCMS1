<?php
// functions.php

function displayMedicineInventory() {
    include 'connect.php'; // Include the database connection file

    $sql = "SELECT * FROM inv_meds";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["meds_name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["med_dscrptn"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["stock_in"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["stock_out"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["stock_exp"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["stock_avail"]) . "</td>";
            echo "<td class='action-icons'> 
                    <a href='#' class='edit-btn' onclick='openEditMed(" . $row["med_id"] . ", \"" . htmlspecialchars($row["meds_name"]) . "\", " . $row["stock_out"] . ", " . $row["stock_exp"] . ", " . $row["stock_avail"] . ")'><img src='edit_icon.png' alt='Edit' style='width: 20px; height: 20px;'></a>
                    <a href='#' class='delete-btn' onclick='deleteMedicine(" . $row["med_id"] . ")'><img src='delete_icon.png' alt='Delete' style='width: 20px; height: 20px;'></a>
                </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No medicines found</td></tr>";
    }

    // Close database connection
    $conn->close();
}
?>
