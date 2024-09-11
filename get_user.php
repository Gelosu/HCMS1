<?php
include 'connect.php';

$id = $_GET['id'];
$sql = "SELECT id, adname, adsurname, adusername, adpass FROM admin WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result && $row = mysqli_fetch_assoc($result)) {
  echo json_encode($row);
} else {
  echo json_encode(['error' => 'User not found']);
}

mysqli_close($conn);
?>
