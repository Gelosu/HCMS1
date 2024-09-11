<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Inventory</title>
    <style>
        /* CSS styles */
        /* Table styles */
        #content {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #f2f2f2;
        }

        /* Button and input styles */
        .add-button-container {
            text-align: right;
            margin-bottom: 10px;
        }

        .add-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .search-container {
            margin-bottom: 10px;
        }

        .search-container input[type=text] {
            padding: 6px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 200px;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #f2f2f2;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .modal-content h3 {
            margin-top: 0;
        }

        .modal-content label {
            display: block;
            margin-bottom: 5px;
        }

        .modal-content input[type="text"],
        .modal-content input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .modal-content input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .modal-content input[type="submit"]:hover {
            background-color: #45a049;
        }

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
    </style>
</head>
<body>

<h2>Medicine Inventory</h2>

<!-- Add button container -->
<div class="add-button-container">
    <button onclick="openModal()" class="add-button">Add Medicine</button>
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
                <a href='#' class='edit-btn' onclick='openEditModal(" . $row["med_id"] . ")'><img src='edit_icon.png' alt='Edit' style='width: 20px; height: 20px;'></a>
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

<!-- The Modal for adding new medicine -->
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

<!-- The Modal for editing existing medicine -->
<div id="editModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeEditModal()">&times;</span>
    <h3>Edit Medicine</h3>
    <form id="editForm" action="update_meds.php" method="post">
        <input type="hidden" id="editMedId" name="medId">
       
        
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

<script>
    // Open the add medicine modal
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    // Close the add medicine modal
    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    // Open the edit medicine modal with pre-filled data
    function openEditModal(medId) {
        var modal = document.getElementById("editModal");
        modal.style.display = "block";

        // Fetch medicine data using AJAX or PHP (not shown here)
        // Once you have the data, populate the form fields
        // For demonstration purpose, let's assume you have the data in a JavaScript object
        var medicineData = {
            // Sample medicine data (replace with actual data retrieval)
            medName: "Sample Medicine",
            medDesc: "Sample Description",
            stockIn: 100,
            stockOut: 20,
            stockExp: 5,
            stockAvail: 75
        };

        document.getElementById("editMedId").value = medId;
        document.getElementById("editMedName").value = medicineData.medName;
        document.getElementById("editMedDesc").value = medicineData.medDesc;
        document.getElementById("editStockIn").value = medicineData.stockIn;
        document.getElementById("editStockOut").value = medicineData.stockOut;
        document.getElementById("editStockExp").value = medicineData.stockExp;
        document.getElementById("editStockAvail").value = medicineData.stockAvail;
    }

    // Close the edit medicine modal
    function closeEditModal() {
        var modal = document.getElementById("editModal");
        modal.style.display = "none";
    }

    // Search function
    function searchTable() {
        // Implementation...
    }
</script>
<script>
    function deleteMedicine(medId) {
        var confirmation = confirm("Are you sure you want to delete this medicine?");
        if (confirmation) {
            $.ajax({
                type: "POST",
                url: "delete_meds.php",
                data: { med_id: medId }, // Use 'med_id' as the key
                success: function(response) {
                    alert(response);
                    // Refresh the page or update the table as needed
                }
            });
        }
    }
</script>


</body>
</html>
