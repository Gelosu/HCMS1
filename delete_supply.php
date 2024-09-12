<?php
header('Content-Type: application/json');
include 'connect.php';

// Check if the request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the supply ID from POST request
    $medSupId = $_POST['medSupId'];

    // Prepare SQL delete query with placeholder
    $sql = "DELETE FROM inv_medsup WHERE med_supId = ?";

    // Prepare and bind parameters to the SQL statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $medSupId);

        if ($stmt->execute()) {
            // After deletion, fetch the updated list of supplies
            $fetchSql = "SELECT * FROM inv_medsup";
            $result = $conn->query($fetchSql);

            $supplies = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $supplies[] = $row;
                }
            }

            // Return the updated supply list in JSON format
            echo json_encode([
                "success" => true,
                "message" => "Record deleted successfully",
                "supplies" => $supplies
            ]);
        } else {
            echo json_encode(["success" => false, "message" => "Error deleting record: " . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Error preparing statement: " . $conn->error]);
    }

    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
}
?>
