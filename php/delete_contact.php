<?php
    include '../php/dbconnection.php'; // Include the database connection file to connect to the database

    $contact_ID =  $_POST["contactId"]; // Retrieve the contact ID sent via POST request

    $sql = "DELETE FROM contacts WHERE id=$contact_ID"; // SQL statement to delete the contact from the 'contacts' table where the ID matches
    
    // Execute the SQL statement
    if ($conn->query($sql)==TRUE) {
      echo "Contact deleted successfully!";
    }else{
        echo "Error while deleting the contact.";
    }

    $conn->close(); // Close the database connection
?>