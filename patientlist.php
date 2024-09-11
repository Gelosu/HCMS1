<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient List</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
<h2>Patient List</h2>

<!-- Add button container -->
<div class="add-button-container">
    <button>Add Medicine</button>
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
                                <button class='edit' onclick='openEditModal(" . $row["p_id"] . ", \"" . $row["p_name"] . "\", \"" . $row["p_age"] . "\", \"" . $row["p_bday"] . "\", \"" . $row["p_address"] . "\", \"" . $row["p_contper"] . "\", \"" . $row["p_type"] . "\")'>Edit</button>
                                <button class='delete' data-id='" . $row["p_id"] . "'>Delete</button>
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

    <!-- Modal for Edit Patient -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Edit Patient Information</h2>
            <form id="editForm" onsubmit="submitEditedPatient(); return false;">
                <input type="hidden" id="patient_id" name="patient_id">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br><br>
                <label for="age">Age:</label>
                <input type="text" id="age" name="age"><br><br>
                <label for="bday">Birthday:</label>
                <input type="date" id="bday" name="bday"><br><br>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address"><br><br>
                <label for="contact_person">Contact Person:</label>
                <input type="text" id="contact_person" name="contact_person"><br><br>
                <label for="type">Type:</label>
                <input type="text" id="type" name="type"><br><br>
                <input type="submit" value="Save Changes">
            </form>
        </div>
    </div>

    <script>
        // Function to open the edit modal and pre-fill form fields with patient's information
        function openEditModal(id, name, age, bday, address, contact_person, type) {
            document.getElementById("patient_id").value = id;
            document.getElementById("name").value = name;
            document.getElementById("age").value = age;
            document.getElementById("bday").value = bday;
            document.getElementById("address").value = address;
            document.getElementById("contact_person").value = contact_person;
            document.getElementById("type").value = type;

            // Show the modal
            document.getElementById("editModal").style.display = "block";
        }

        // Function to close the edit modal
        function closeModal() {
            document.getElementById("editModal").style.display = "none";
        }

        // Function to submit the edited patient information to the server
        function submitEditedPatient() {
            var patient_id = document.getElementById("patient_id").value;
            var name = document.getElementById("name").value;
            var age = document.getElementById("age").value;
            var bday = document.getElementById("bday").value;
            var address = document.getElementById("address").value;
            var contact_person = document.getElementById("contact_person").value;
            var type = document.getElementById("type").value;

            // Create an object to hold the patient data
            var patientData = {
                patient_id: patient_id,
                name: name,
                age: age,
                bday: bday,
                address: address,
                contact_person: contact_person,
                type: type
            };

            // Send a POST request to the server to update the patient information
            fetch('update_patient.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(patientData)
            })
            .then(response => {
                if (response.ok) {
                    // Optionally, you can close the modal or show a success message
                    closeModal();
                    // Reload the patient list or perform any other action you want
                    document.getElementById("patientList").click(); // Assuming this triggers fetching the patient list
                } else {
                    // Handle errors if any
                    console.error('Error updating patient information:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error updating patient information:', error);
            });
        }

        // Add event listeners to delete buttons
        document.querySelectorAll('.delete').forEach(button => {
            button.addEventListener('click', function() {
                var patientId = this.getAttribute('data-id');
                // Send an AJAX request to delete_patient.php
                fetch('delete_patient.php?id=' + patientId, {
                    method: 'GET'
                })
                .then(response => {
                    if (response.ok) {
                        // Update UI (e.g., remove the deleted patient row from the table)
                        this.closest('tr').remove(); // Remove the row from the table
                    } else {
                        console.error('Failed to delete patient:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Error deleting patient:', error);
                });
            });
        });
    </script>
</body>
</html>
