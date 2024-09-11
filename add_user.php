<?php
// Check if form data is sent
if(isset($_POST['adname']) && isset($_POST['adsurname']) && isset($_POST['adusername']) && isset($_POST['adpass'])) {
    // Include your database connection file
    include 'connect.php';

    // Get form data
    $first_name = $_POST['adname'];
    $last_name = $_POST['adsurname'];
    $username = $_POST['adusername'];
    $password = $_POST['adpass'];

    // Sanitize input to prevent SQL injection
    $first_name = $conn->real_escape_string($first_name);
    $last_name = $conn->real_escape_string($last_name);
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // SQL query to insert a new user
    $sql = "INSERT INTO admin (adname, adsurname, adusername, adpass) VALUES ('$first_name', '$last_name', '$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "success"; // Respond with success
    } else {
        echo "error: " . $conn->error; // Respond with error message
    }
    

    $conn->close();
} else {
    // If form data is not set, return an error message
    echo "Error: Required parameters are not set";
}
?>
