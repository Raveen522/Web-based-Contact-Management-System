<?php
    include '../php/dbconnection.php'; // Include the database connection file to connect to the database

    $name =  $_POST["name"];// Retrieve the name sent via POST request from the client

    // Prepare SQL query to search for contacts whose names start with the provided input and order the results by their ID in ascending order

    $sqlQuery = "SELECT * FROM contacts WHERE name LIKE '$name%' ORDER BY id ASC";
    $result = $conn->query($sqlQuery);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // For each contact, echo HTML markup displaying the contact's details
            // Each contact is contained within a div element that is clickable
            // The click event is handled by the 'load_contact_details' JavaScript function, passing the contact's ID
            echo "
                <div class='contact-list-item container row' id='".$row["id"]."' onclick='load_contact_details(this.id)'>
                    <img src='./data/contact_photos/user.png' alt='' class='contact-photo'>
                    <h3 class='contact-name'>".$row["name"]."</h3>
                </div>
            ";
        }
    } else {
        echo "<h2>No contact found</h2>";
    }
    $conn->close(); // Close the database connection
?>