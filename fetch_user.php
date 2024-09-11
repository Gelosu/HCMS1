<?php
include 'connect.php';

// Check if 'adid' is provided
if (isset($_GET['adid'])) {
    // Sanitize the 'adid' parameter to prevent SQL injection
    $adid = intval($_GET['adid']);
    
    // Update the query to select the user based on 'adid'
    $sql = "SELECT adname, adsurname, adusername, adpass FROM admin WHERE adid = '$adid'";
    $result = mysqli_query($conn, $sql);

    // Check if the result contains any row
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Return the user details in JSON format
        echo json_encode([
            'firstName' => $row['adname'],
            'lastName' => $row['adsurname'],
            'username' => $row['adusername'],
            'password' => $row['adpass']
        ]);
    } else {
        // User not found
        echo json_encode(['error' => 'User not found']);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // No 'adid' provided in the request
    echo json_encode(['error' => 'No adid provided']);
}
?>
