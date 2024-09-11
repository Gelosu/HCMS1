<?php
include 'connection.php';

// Fetch data from the inv_meds table
$sql = "SELECT * FROM inv_meds";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["meds_name"] . "</td>";
        echo "<td>" . $row["med_dscrptn"] . "</td>";
        echo "<td>" . $row["stock_in"] . "</td>";
        echo "<td>" . $row["stock_out"] . "</td>";
        echo "<td>" . $row["stock_exp"] . "</td>";
        echo "<td>" . $row["stock_avail"] . "</td>";
        echo "<td class='action-icons'>
                <a href='#'><img src='add_icon.png' alt='Add'></a>
                <a href='#'><img src='edit_icon.png' alt='Edit'></a>
                <a href='#'><img src='delete_icon.png' alt='Delete'></a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "0 results"; // If no rows were returned
}

// Close connection (optional, as it will automatically close when the script ends)
$conn->close();
?>
