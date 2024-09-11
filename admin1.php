<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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

        /* Sidebar Styles */
        #sidebar {
            position: fixed;
            left: 0;
            top: 60px;
            bottom: 0;
            width: 200px;
            background-color: #368533;
            padding-top: 20px;
            overflow-y: auto;
        }

        /* Main Content Styles */
        #main-content {
            margin-left: 200px; /* Adjusted to match the width of the sidebar */
            padding: 20px;
            display: flex; /* Use flexbox to position the table beside the sidebar */
        }

        /* Table Styles */
        table {
            width: calc(100% - 250px); /* Adjusted to fill more space beside the sidebar */
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 15px; /* Adjusted padding for cells */
            border: 1px solid #ddd;
            /* Adjusted width to occupy more space */
            width: 250px; /* You can adjust this value as needed */
            font-size: 14px;
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

    <div id="sidebar">
        <div id="logo">
            <img src="mary.jpg" alt="Logo">
        </div>
        <ul>
            <li><a href="#" id="userLink" onclick="toggleSection('user')">Users</a></li>
        </ul>
        <button id="logoutBtn" onclick="logout()">Logout</button>
    </div>

    <div id="main-content">
        <section id="user">
            <div id="userSection">
                <button onclick="openAddUserModal()">Add User</button>
                <table>
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'connect.php';
                        $sql = "SELECT adid, adname, adsurname, adusername, adpass FROM admin";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row["adname"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["adsurname"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["adusername"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["adpass"]) . "</td>";
                                echo "<td>";
                                echo "<button onclick=\"openEditUserModal('" . htmlspecialchars($row['adid']) . "')\">Edit</button>";
                                echo "<button onclick=\"deleteUser(" . htmlspecialchars($row['adid']) . ")\">Delete</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Error: " . htmlspecialchars(mysqli_error($conn)) . "</td></tr>";
                        }

                        // Close the database connection
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>

            <div id="addUserModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeAddUserModal()">&times;</span>
                    <h3>Add New User</h3>
                    <form id="addUserForm" onsubmit="submitForm(event)">
                        <label for="adname">First Name:</label>
                        <input type="text" id="adname" name="adname" required><br><br>

                        <label for="adsurname">Last Name:</label>
                        <input type="text" id="adsurname" name="adsurname" required><br><br>

                        <label for="adusername">Username:</label>
                        <input type="text" id="adusername" name="adusername" required><br><br>

                        <label for="adpass">Password:</label>
                        <input type="password" id="adpass" name="adpass" required><br><br>

                        <input type="submit" value="Add User">
                    </form>
                </div>
            </div>

            <div id="editUserModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeEditUserModal()">&times;</span>
                    <h3>Edit User</h3>
                    <form id="editUserForm" onsubmit="submitEditForm(event)">
                        <input type="hidden" id="editUserId" name="adusername">
                        <label for="editAdname">First Name:</label>
                        <input type="text" id="editAdname" name="adname" required><br><br>

                        <label for="editAdsurname">Last Name:</label>
                        <input type="text" id="editAdsurname" name="adsurname" required><br><br>

                        <label for="editAdusername">Username:</label>
                        <input type="text" id="editAdusername" name="adusername" required disabled><br><br>

                        <label for="editAdpass">Password:</label>
                        <input type="password" id="editAdpass" name="adpass" required><br><br>

                        <input type="submit" value="Save Changes">
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script>
        function openAddUserModal() {
            document.getElementById('addUserModal').style.display = 'block';
        }

        function closeAddUserModal() {
            document.getElementById('addUserModal').style.display = 'none';
        }

        function openEditUserModal(id) {
    console.log('Edit button clicked for adid:', id);

   
    fetch('fetch_user.php?adid=' + encodeURIComponent(id))
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Error:', data.error);
                alert('User not found.');
                return;
            }

            // Populate the form with user data
            document.getElementById('editUserId').value = id; // Store the adid in a hidden field or similar
            document.getElementById('editAdname').value = data.firstName;
            document.getElementById('editAdsurname').value = data.lastName;
            document.getElementById('editAdusername').value = data.username;
            document.getElementById('editAdpass').value = data.password;

            // Show the modal
            document.getElementById('editUserModal').style.display = 'block';
        })
        .catch(error => console.error('Error fetching user data:', error));
}


        function closeEditUserModal() {
            document.getElementById('editUserModal').style.display = 'none';
        }

        function submitForm(event) {
            event.preventDefault();

            var formData = new FormData(document.getElementById('addUserForm'));

            fetch('add_user.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(result => {
                console.log('Success:', result);
                closeAddUserModal();
                location.reload(); // Reload to update user list
            })
            .catch(error => console.error('Error:', error));
        }

        function submitEditForm(event) {
            event.preventDefault();

            var formData = new FormData(document.getElementById('editUserForm'));

            fetch('edit_user.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(result => {
                console.log('Success:', result);
                closeEditUserModal();
                location.reload(); // Reload to update user list
            })
            .catch(error => console.error('Error:', error));
        }

        function deleteUser(firstname, lastname, username) {
    fetch('fetch_adid.php?firstname=' + encodeURIComponent(firstname) +
          '&lastname=' + encodeURIComponent(lastname) +
          '&username=' + encodeURIComponent(username))
        .then(response => response.json())
        .then(data => {
            if (data.adid) {
                fetch('delete_user.php?adid=' + encodeURIComponent(data.adid), {
                    method: 'GET'
                })
                .then(response => response.json())
                .then(result => {
                    if (result.message) {
                        alert(result.message);
                        refreshUserTable();
                    } else if (result.error) {
                        console.error(result.error);
                    }
                })
                .catch(error => console.error('Error:', error));
            } else if (data.error) {
                console.error(data.error);
            }
        })
        .catch(error => console.error('Error:', error));
}

function deleteUser(adid) {
    if (confirm('Are you sure you want to delete this user?')) {
        fetch('delete_user.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: adid })
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert('User deleted successfully');
                // Remove the row from the table
                document.querySelector(`button[onclick='deleteUser(${adid})']`).closest('tr').remove();
            } else {
                alert('Error deleting user: ' + result.error);
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

        // Close modals when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                closeAddUserModal();
                closeEditUserModal();
            }
        }

        function logout() {
        window.location.href = '/HCMS';
    }    
    </script>
</body>
</html>
