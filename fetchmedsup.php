<?php
include 'connect.php';

$sql = "SELECT * FROM inv_medsup";
$result = $conn->query($sql);

if (!$result) {
    die("Error executing query: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["med_supId"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["prod_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["stck_in"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["stck_out"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["stck_expired"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["stck_avl"]) . "</td>";
        echo "<td class='action-icons'>
              <a href='#' class='edit-btn' onclick='openEditModal(" . htmlspecialchars($row["med_supId"]) . ")'><img src='edit_icon.png' alt='Edit' style='width: 20px; height: 20px;'></a>
              <a href='#' class='delete-btn' onclick='deleteMedicalSupply(" . htmlspecialchars($row["med_supId"]) . ")'><img src='delete_icon.png' alt='Delete' style='width: 20px; height: 20px;'></a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No medical supplies found</td></tr>";
}

$conn->close();
?>
