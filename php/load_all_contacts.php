<?php
    include '../php/dbconnection.php'; // Include the database connection file to connect to the database

    $sqlQuery = "SELECT * FROM contacts ORDER BY id ASC"; // SQL query to select all contacts from the 'contacts' table, ordered by their ID in ascending order
    $result = $conn->query($sqlQuery); // Execute the SQL query

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // For each contact, echo a div element containing the contact's information
            // This includes an image (from a placeholder if not specified) and the contact's name (in future do development for this feature)
            // The div's ID is set to the contact's ID from the database
            // When clicked, the div calls the JavaScript function 'load_contact_details' with the contact's ID
            echo "
                <div class='contact-list-item container row' id='".$row["id"]."' onclick='load_contact_details(this.id)'>
                    <img src='./data/contact_photos/user.png' alt='' class='contact-photo'>
                    <h2 class='contact-name'>".$row["name"]."</h2>
                </div>
            ";
        }
    } else {
        echo "<h2>No contact found</h2>";
    }
    $conn->close(); // Close the database connection
?>