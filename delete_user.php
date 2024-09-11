<?php
include 'connect.php';

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'] ?? null;

if ($id) {
    $id = intval($id); // Sanitize ID
    $sql = "DELETE FROM admin WHERE adid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Error deleting user']);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'No ID provided']);
}

$conn->close();
?>
