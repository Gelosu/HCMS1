<?php
// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to database
require_once('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Debug: Output POST data (optional)
    // var_dump($_POST);

    // Prepare a statement to select hashed password from the database
    $stmt_admin = $conn->prepare("SELECT adusername, adpass FROM admin WHERE adusername = ?");
    $stmt_admin->bind_param("s", $username);
    $stmt_admin->execute();
    $stmt_admin->store_result(); // Store the result set
    $stmt_admin->bind_result($adusername, $adpass); // Bind the result columns (username, hashed password)
    $stmt_admin->fetch(); // Fetch the result

    // Check if user exists
    if ($stmt_admin->num_rows > 0) {
        // Verify password using password_verify
        if (password_verify($password, $adpass)) {
            // Password is correct, redirect to admin.php
            header("Location: admin.php");
            exit();
        } else {
            // Password is incorrect
            echo "Invalid password.";
        }
    } else {
        // User does not exist
        echo "User not found.";
    }

    // Close statements and connection
    $stmt_admin->close();
    $conn->close();
}
?>
