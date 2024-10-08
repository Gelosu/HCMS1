<?php
header('Content-Type: application/json');

// Check if the request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';
    $response = array();

    if (isset($_POST['medId'])) {
        $medId = $_POST['medId'];

        // Prepare SQL delete query with placeholder
        $sql = "DELETE FROM inv_meds WHERE med_id = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $medId);

            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    // Fetch the updated list of medicines
                    $result = $conn->query("SELECT * FROM inv_meds");
                    $medicines = $result->fetch_all(MYSQLI_ASSOC);
                    
                    $response['success'] = true;
                    $response['message'] = 'Medicine deleted successfully';
                    $response['medicines'] = $medicines; // Include updated medicines
                } else {
                    $response['success'] = false;
                    $response['message'] = 'No records found to delete';
                }
            } else {
                $response['success'] = false;
                $response['message'] = 'Error deleting record: ' . $stmt->error;
            }

            $stmt->close();
        } else {
            $response['success'] = false;
            $response['message'] = 'Error preparing statement: ' . $conn->error;
        }

        $conn->close();
    } else {
        $response['success'] = false;
        $response['message'] = 'No medicine ID provided';
    }
} else {
    $response['success'] = false;
    $response['message'] = 'Invalid request method';
}

echo json_encode($response);
?>
