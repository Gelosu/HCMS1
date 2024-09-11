<?php
include 'connect.php';

// Fetch patients from the database
$sql = "SELECT * FROM patient";
$result = $conn->query($sql);

// Output each patient as a table row
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["p_id"] . "</td>
                <td>" . $row["p_name"] . "</td>
                <td>" . $row["p_age"] . "</td>
                <td>" . $row["p_bday"] . "</td>
                <td>" . $row["p_address"] . "</td>
                <td>" . $row["p_contper"] . "</td>
                <td>" . $row["p_type"] . "</td>
                <td>
                    <button class='edit' data-id='" . $row["p_id"] . "'>Edit</button>
                    <button class='delete' data-id='" . $row["p_id"] . "'>Delete</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No patients found</td></tr>";
}

// Close the database connection
$conn->close();
?>
