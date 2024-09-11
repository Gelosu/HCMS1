
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STA. MARIA HCMS</title>
    <link rel="stylesheet" href="mamamoadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-DlSg7oCoIEZd3TpUB8tgL5irGlVg8H1Yqf+i6BR6DNOxj8GkoL9Ji/ZgQwsyu8ksk7Qf5owSJ3dZh8tCx3oA8A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Global Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            position: relative;
            overflow: hidden;
            background-color: #FFFFEE;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -10;
            opacity: .1;
            background: url('mary.jpg') center/45% no-repeat; /* Adjust the image path and scaling */
        }

        header {
            background-color: #368533;
            color: rgb(243, 239, 239);
            text-align: left;
            padding: 3px; /* Adjust the padding to make it smaller */
            height: 50px; /* Adjust the height to make it thinner */
        }

        header h1 {
            font-size: 25px; /* Set the text size to 10px */
            margin: 1; /* Remove default margin for h1 */
        }

        footer {
            background-color: #368533;
            color: black;
            text-align: center;
            padding: 1px; /* Adjust the padding to make it smaller */
            height: 24px; /* Adjust the height to make it thinner */
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        #sidebar {
            position: fixed;
            left: 0;
            top: 60px; /* Height of the header */
            bottom: 30px; /* Height of the footer */
            width: 150px;
            background-color: #368533;
            padding-top: 20px;
            overflow-y: auto;
        }

        #sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #sidebar ul li {
            padding: 10px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        #sidebar ul li:hover {
            background-color: #1f3017;
        }

        #sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }

        #logo {
            text-align: center;
            margin-bottom: 20px;
        }

        #logo img {
            width: 100px; /* Adjust as needed */
        }

        #content {
            margin-left: 200px;
            padding: 20px;
        }

        /* Table Styles */
        table {
            width: 100%; /* Update width to 90% */
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #ddd;
            width: fit-content;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f2f2f2;
        }

        /* Add button container */
        .add-button-container {
            text-align: right;
            margin-top: -15px;
            margin-left: 10px;
        }

        /* Add Patient button style */
        .add-button-container button {
            background-color: #368533;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-button-container button:hover {
            background-color: #2d6e2a;
        }
        .search-and-add-container {
            display: flex;             /* Use flexbox for alignment */
            justify-content: space-between; /* Distribute space between elements */
            align-items: center;       /* Center align items vertically */
            margin-bottom: 20px;       /* Space below the container */
        }
        
        .search-container {
            flex: 1;                   /* Take up available space */
            }
        #searchInput {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
         /* CSS for the modal */
         .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
            align-items: left;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
        }

        input[type="submit"] {
            background-color: #368533;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2d6e2a;
        }

        label input {
            margin-right: 4px;
        }

        /* Hide patient list section by default */
        #patient-list {
            display: none;
        }

        /* Hide medicine inventory section by default */
        #medicine-inventory {
            display: none;
        }
    </style>
</head>
<body>

<header>
    <h1>BRGY STA. MARIA HEALTH CENTER</h1>
</header>

<!-- SIDE BAR -->
<div id="sidebar">
    <div id="logo">
        <img src="mary.jpg" alt="Logo">
    </div>
    <ul>
    <li><a href="#" onclick="setActiveSection('dashboard')">Dashboard</a></li>
        <li><a href="#" onclick="setActiveSection('medical_supplies-inventory')">Medical & Emergency Supplies Inventory</a></li>
        <li><a href="#" onclick="setActiveSection('medicine-inventory')">Medicine Inventory</a></li>
        <li><a href="#" onclick="setActiveSection('patient-list')">Patient List</a></li>
       
        
       
    </ul>
    <button id="logoutBtn">Logout</button>
</div>

<!-- Table container para sa patientlist baka mabobo ka e -->
<div id="content">
<section id="patient-list" class="section">
        <h2>Patient List</h2>

        <!-- Add button container -->
        <div class="add-button-container">
            <button onclick="location.href='patientreg.php'">Add Patient</button>
        </div>

        <!-- Search bar container -->
        <div class="search-container">
            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for Patient...">
        </div>

        <table id="patientTable">
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Birthday</th>
                    <th>Address</th>
                    <th>Contact Person</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
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
                                <a href='#' class='edit-btn' onclick='openEditModal(" . $row["p_id"] . ", \"" . addslashes($row["p_name"]) . "\", \"" . $row["p_age"] . "\", \"" . $row["p_bday"] . "\", \"" . addslashes($row["p_address"]) . "\", \"" . addslashes($row["p_contper"]) . "\", \"" . addslashes($row["p_type"]) . "\")'><img src='edit_icon.png' alt='Edit' style='width: 20px; height: 20px;'></a>
                                <a href='#' class='delete-btn' onclick='deletePatient(" . $row["p_id"] . ", \"" . addslashes($row["p_name"]) . "\", \"" . $row["p_age"] . "\", \"" . $row["p_bday"] . "\", \"" . addslashes($row["p_address"]) . "\", \"" . addslashes($row["p_contper"]) . "\", \"" . addslashes($row["p_type"]) . "\")'><img src='delete_icon.png' alt='Delete' style='width: 20px; height: 20px;'></a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No patients found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </section>

<!-- LAGAY MO DITO MODAL --> 

<!-- Modal for editing existing patient -->
<div id="editPatientModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditPatientModal()">&times;</span>
        <h3>Edit Patient</h3>
        <form id="editPatientForm" action="update_patient.php" method="post">
            <input type="hidden" id="editPatientId" name="patientId">
            
            <label for="editName">Name:</label>
            <input type="text" id="editName" name="name" required><br><br>
            
            <label for="editAge">Age:</label>
            <input type="number" id="editAge" name="age" required><br><br>
            
            <label for="editBirthday">Birthday:</label>
            <input type="date" id="editBirthday" name="birthday" required><br><br>
            
            <label for="editAddress">Address:</label>
            <input type="text" id="editAddress" name="address" required><br><br>
            
            <label for="editContactPerson">Contact Person:</label>
            <input type="text" id="editContactPerson" name="contactPerson" required><br><br>
            
            <label for="editType">Type:</label>
            <input type="text" id="editType" name="type" required><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</div>





<!-- MEDICINE INVETORY DITO --> 

<section id="medicine-inventory" class="section">
        <h2>Medicine Inventory</h2>

        <!-- Add button container -->
        <div class="add-button-container">
            <button onclick="openModal()">Add Medicine</button>
        </div>

        <!-- Search bar container -->
        <div class="search-container">
            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for medicines...">
        </div>

        <table id="medTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Medicine ID</th>
                    <th>Medicine Name</th>
                    <th>Description</th>
                    <th>Stock In</th>
                    <th>Stock Out</th>
                    <th>Expired</th>
                    <th>Stock Available</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include database connection
                include 'connect.php';

                // Fetch data from the inv_meds table
                $sql = "SELECT * FROM inv_meds";
                $result = $conn->query($sql);

                // Check if any rows were returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td></td>"; // Auto-numbering will be done via JavaScript
                        echo "<td>" . $row["med_id"] . "</td>"; // Display ID
                        echo "<td>" . $row["meds_name"] . "</td>";
                        echo "<td>" . $row["med_dscrptn"] . "</td>";
                        echo "<td>" . $row["stock_in"] . "</td>";
                        echo "<td>" . $row["stock_out"] . "</td>";
                        echo "<td>" . $row["stock_exp"] . "</td>";
                        echo "<td>" . $row["stock_avail"] . "</td>";
                        echo "<td class='action-icons'> 
                        <a href='#' class='edit-btn' onclick='openEditModal(" . $row["med_id"] . ", \"" . $row["meds_name"] . "\", " . $row["stock_out"] . ", " . $row["stock_exp"] . ", " . $row["stock_avail"] . ")'><img src='edit_icon.png' alt='Edit' style='width: 20px; height: 20px;'></a>
        <a href='#' class='delete-btn' onclick='deleteMedicine(" . $row["med_id"] . ")'><img src='delete_icon.png' alt='Delete' style='width: 20px; height: 20px;'></a>
                        
                      </td>";
                
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No medicines found</td></tr>";
                }

                // Close database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </section>


<!-- MEDICAL SUPPLY INVENTORY -->
    <section id="medical_supplies-inventory" class="section">
    <h2>Medical & Emergency Supplies Inventory</h2>
    <div class="search-and-add-container">
        <!-- Search bar container -->
        <div class="search-container">
        <input type="text" id="searchInput" onkeyup="searchTable1(this.value);" placeholder="Search for medical supplies...">
        </div>

        <!-- Button container -->
        <div class="add-button-container">
            <button onclick="openAddMedicalSupplyModal()">Add Medical Supply</button>
        </div>
    </div>

<!-- MEDICAL SUPPLY TABLE -->
<table id="medicalSuppliesTable">
    <thead>
        <tr>
            
            <th>Supply Name</th>
            <th>Stock In</th>
            <th>Stock Out</th>
            <th>Expired</th>
            <th>Stock Available</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    include 'connect.php';

    
    $sql = "SELECT * FROM inv_medsup";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["prod_name"] . "</td>"; 
            echo "<td>" . $row["stck_in"] . "</td>"; 
            echo "<td>" . $row["stck_out"] . "</td>"; 
            echo "<td>" . $row["stck_expired"] . "</td>"; 
            echo "<td>" . $row["stck_avl"] . "</td>"; 
            echo "<td class='action-icons'>";
            echo "<button onclick=\"openEditMedSupp('" . 
            $row["med_supId"] . "', '" . 
            $row["prod_name"] . "', '" . 
            $row["stck_in"] . "', '" . 
            $row["stck_out"] . "', '" . 
            $row["stck_expired"] . "', '" . 
            $row["stck_avl"] . "')\">";
       echo "<img src='edit_icon.png' alt='Edit' style='width: 20px; height: 20px;'></button>";
       
            echo "<button onclick=\"deleteEmergencysupply('" . $row["med_supId"] . "')\">";
            echo "<img src='delete_icon.png' alt='Delete' class='delete-btn' style='width: 20px; height: 20px;'></button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No medical supplies found</td></tr>";
    }

    $conn->close();
    ?>
</tbody>

</table>
<!-- Egency Supply --> 
<section id="emergency_supply-inventory" style="display: none;">
    <h2>Emergency Supplies Inventory</h2>

    <!-- Add button container -->
    <div class="add-button-container">
        <button onclick="openModal()">Add Emergency Supply</button>
    </div>

    <!-- Search bar container -->
    <div class="search-container">
        <input type="text" id="searchInput" onkeyup="searchTable1()" placeholder="Search for emergency supplies...">
    </div>

    <table id="medicalSupplyTable">
    <thead>
        <tr>
            <th>Supply ID</th>
            <th>Supply Name</th>
            <th>Stock In</th>
            <th>Stock Out</th>
            <th>Expired</th>
            <th>Stock Available</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

</section>
       







    <!-- Modal for adding new medicine -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Add New Medicine</h3>
            <form action="add_meds.php" method="post">
                <label for="medName">Medicine Name:</label>
                <input type="text" id="medName" name="medName" required><br><br>
                
                <label for="medDesc">Description:</label>
                <input type="text" id="medDesc" name="medDesc"><br><br>
                
                <label for="stockIn">Stock In:</label>
                <input type="number" id="stockIn" name="stockIn" required><br><br>
                
                <label for="stockOut">Stock Out:</label>
                <input type="number" id="stockOut" name="stockOut" required><br><br>
                
                <label for="stockExp">Expired:</label>
                <input type="number" id="stockExp" name="stockExp" required><br><br>
                
                <label for="stockAvail">Stock Available:</label>
                <input type="number" id="stockAvail" name="stockAvail" required><br><br>
                
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

<!-- Modal for adding new medical supply -->
<div id="addMedicalSupplyModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeAddMedicalSupplyModal()">&times;</span>
        <h3>Add New Medical & Emergency Supply</h3>
        <form id="addMedicalSupplyForm" onsubmit="submitMedicalSupplyForm(event)">
            <label for="supplyName">Supply Name:</label>
            <input type="text" id="supplyName" name="supplyName" required><br><br>
            
            <label for="stockIn">Stock In:</label>
            <input type="number" id="stockIn" name="stockIn" required><br><br>
            
            <label for="stockOut">Stock Out:</label>
            <input type="number" id="stockOut" name="stockOut" required><br><br>
            
            <label for="stockExpired">Stock Expired:</label>
            <input type="number" id="stockExpired" name="stockExpired" required><br><br>
            
            <label for="stockAvailable">Stock Available:</label>
            <input type="number" id="stockAvailable" name="stockAvailable" required><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</div>

<!-- Modal for editing medical supplies -->
<div id="editMedicalSupplyModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
        <h3>Edit Medical/Emergency Supply</h3>
        <form id="editForm" method="post">
            <input type="hidden" id="editMedId" name="supplyId">
            
            <label for="editSupplyName">Supply Name:</label>
            <input type="text" id="editSupplyName" name="supplyName" required><br><br>
            
            <label for="editStockIn">Stock In:</label>
            <input type="number" id="editStockIn" name="stockIn" required><br><br>
            
            <label for="editStockOut">Stock Out:</label>
            <input type="number" id="editStockOut" name="stockOut" required><br><br>
            
            <label for="editStockExp">Expired:</label>
            <input type="number" id="editStockExp" name="stockExpired" required><br><br>
            
            <label for="editStockAvail">Stock Available:</label>
            <input type="number" id="editStockAvail" name="stockAvailable" required><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</div>

<!-- Modal for editing existing medicine -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
        <h3>Edit Medical/Emergency Supply</h3>
        <form id="editForm" action="update_meds.php" method="post">
            <input type="hidden" id="editMedId" name="medId">
            
            <label for="editSupplyName">Supply Name:</label>
            <input type="text" id="editSupplyName" name="supplyName" required><br><br>
            
            <label for="editStockOut">Stock Out:</label>
            <input type="number" id="editStockOut" name="stockOut" required><br><br>
            
            <label for="editStockExp">Expired:</label>
            <input type="number" id="editStockExp" name="stockExp" required><br><br>
            
            <label for="editStockAvail">Stock Available:</label>
            <input type="number" id="editStockAvail" name="stockAvail" required><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</div>

   
</div>
<script>
    //INITIAL VARIABLES

    var addMedicalSupplyModal = document.getElementById("addMedicalSupplyModal"); //ADD MEDICAL SUPPLY 
    var editMedicalSupplyModal =document.getElementById("editMedicalSupplyModal") //EDIT MS


    var editModal = document.getElementById("editModal");
    var myModal = document.getElementById('myModal');



    // Function to open a generic modal
    function openModal() {
        if (myModal) {
            myModal.style.display = 'block';
        }
    }

    // Function to close a generic modal
    function closeModal() {
        if (myModal) {
            myModal.style.display = 'none';
        }
    }


    // FUNCTION FOR ADDING MEDICAL SUPPLY 
    function submitMedicalSupplyForm(event) {
    event.preventDefault(); 

    var formData = new FormData(document.getElementById('addMedicalSupplyForm'));

    fetch('add_medical_supply.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        console.log('Success:', result);
        closeAddMedicalSupplyModal(); 
        location.reload();
    })
    .catch(error => console.error('Error submitting form:', error));
}


    // Function to close the add medical supply modal
    function closeAddMedicalSupplyModal() {
        if (addMedicalSupplyModal) {
            addMedicalSupplyModal.style.display = 'none';
        }
    }

    // Function to open the add medical supply modal
    function openAddMedicalSupplyModal() {
        if (addMedicalSupplyModal) {
            addMedicalSupplyModal.style.display = 'block';
        }
    }


    // Function to edit MS
    function openEditMedSupp(medId, supplyName, stockIn, stockOut, stockExpired, stockAvailable) {
    document.getElementById('editMedId').value = medId;
    document.getElementById('editSupplyName').value = supplyName;
    document.getElementById('editStockIn').value = stockIn;
    document.getElementById('editStockOut').value = stockOut;
    document.getElementById('editStockExp').value = stockExpired;
    document.getElementById('editStockAvail').value = stockAvailable;

    editMedicalSupplyModal.style.display = 'block';
}

// Function to close the edit medical supply modal
function closeEditMedSuppModal() {
    var modal = document.getElementById("editMedicalSupplyModal");
    if (modal) {
        modal.style.display = 'none';
    }
}


// Function to submit the edit form data asynchronously
function submitEditMedicalSupplyForm(event) {
    event.preventDefault(); 

    var formData = new FormData(document.getElementById('editForm'));

    fetch('update_supply.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        console.log('Success:', result);
        closeEditMedSuppModal();
        location.reload();
    })
    .catch(error => console.error('Error submitting form:', error));
}

document.getElementById('editForm').addEventListener('submit', submitEditMedicalSupplyForm);

// Function to handle delete MS
function deleteEmergencysupply(medSupId) {
   
    if (confirm('Are you sure you want to delete this item?')) {
      
        fetch('delete_supply.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                'medSupId': medSupId
            })
        })
        .then(response => response.text())
        .then(result => {
            console.log('Success:', result);
            
            location.reload(); 
        })
        .catch(error => console.error('Error deleting record:', error));
    }
}


//SEARCH FOR MED SUP
function searchTable1(inputValue) {
    // Convert the input value to lowercase
    var searchQuery = inputValue.toLowerCase().trim();

    // Get the table and its rows
    var table = document.getElementById('medicalSuppliesTable');
    var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    // Loop through the table rows
    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var cell = row.getElementsByTagName('td')[0]; // Assuming the supply name is in the second column (index 1)
        
        if (cell) {
            var cellValue = cell.textContent || cell.innerText; // Get the text content of the cell
            // Check if the cell value contains the search query
            if (cellValue.toLowerCase().indexOf(searchQuery) > -1) {
                row.style.display = ''; // Show the row if it matches
            } else {
                row.style.display = 'none'; // Hide the row if it doesn't match
            }
        }
    }
}



    //MEDICINE??
    // Function to open the edit modal and populate it with the provided data
    function openEditModal(medId, supplyName, stockOut, stockExp, stockAvail) {
    document.getElementById('editMedId').value = medId;
    document.getElementById('editSupplyName').value = supplyName;
    document.getElementById('editStockOut').value = stockOut;
    document.getElementById('editStockExp').value = stockExp;
    document.getElementById('editStockAvail').value = stockAvail;

    document.getElementById('editModal').style.display = 'block';
}

function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}





    // Function to log out the user
    document.getElementById("logoutBtn").addEventListener("click", function() {
        window.location.href = "logout.php";
    });

    // Function to set and activate the desired section based on navigation clicks
    function setActiveSection(sectionId) {
        window.location.hash = sectionId;  
        toggleSection(sectionId);  // Activate the corresponding section
    }

    // Function to toggle visibility of sections
    function toggleSection(sectionId) {
        var sections = document.querySelectorAll('.section');
        sections.forEach(function(section) {
            if (section.id === sectionId) {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        });
    }

    // When the page loads, show the appropriate section based on the URL hash
    window.onload = function() {
        var hash = window.location.hash.substring(1); 
        if (hash) {
            toggleSection(hash);
        } else {
             
        }
    };

    


</script>


<footer>
    <p>&copy; 2024 BRGY STA. MARIA HEALTH CENTER. All rights reserved.</p>
</footer>

</body>
</html>