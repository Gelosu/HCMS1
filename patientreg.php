

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration Form</title>
    <link rel="stylesheet" href="patientreg.css">
    
   
</head>

<body>



<body>
    <header>
        <h1>STA. MARIA  HEALTH CENTER </h1>
    </header>

    <h2>Patient Registration Form</h2>
<form method="post" action="patientprocess.php">
  

    <label for="name">Name:</label>
    <input type="text" id="p_name" name="p_name" placeholder="SURNAME,FN,MN" required>

    <label for="age">Age:</label>
    <input type="number" id="p_age" name="p_age" required>

    <label for="birthday">Birthday:</label>
    <input type="date" id="p_bday" name="p_bday" required>

    <label for="address">Address:</label>
    <input type="text" id="p_address" name="p_address" required>

    <label for="contact_person">Contact Person:</label>
    <input type="text" id="p_contper" name="p_contper" required>

    <label for="patient_type">Patient Type:</label>
    <select id="p_type" name="p_type" required>
        <option value="">Select Patient Type</option>
        <option value="Pedia">Pedia</option>
        <option value="Senior">Senior</option>
        <option value="PWD">PWD</option>
        <option value="OPD">OPD</option>
    </select>

    <button type="submit">Submit</button>
</form>



    <footer>
        <p>&copy; <?php echo date("Y"); ?> STA.MARIA HCMS. All rights reserved.</p>
    </footer>

</body>

</html>
<?php
// Check for success or error message query parameter
if (isset($_GET['success']) && $_GET['success'] == '1') {
    echo "<script>alert('New record created successfully');</script>";
} elseif (isset($_GET['error'])) {
    echo "<script>alert('Error: " . urldecode($_GET['error']) . "');</script>";
}
?>
