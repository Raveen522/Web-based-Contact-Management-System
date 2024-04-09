<?php
    include '../php/dbconnection.php'; // Include the database connection file to connect to the database

    // Retrieve the contact details sent from the client via POST request
    $contact_ID =  $_POST["contactID"];
    $name =  $_POST["name"];
    $email =  $_POST["email"];
    $phone =  $_POST["phone"];
    $address =  $_POST["address"];
    
    $sql = "UPDATE contacts SET name = '$name', email = '$email', phone = $phone, address = '$address' WHERE id=$contact_ID"; // SQL statement to update the contact details in the 'contacts' table
    
    if ($conn->query($sql)==TRUE) {
      echo "Contact updated successfully!";
    }else{
        echo "Error while updating contact";
    }

    $conn->close(); // Close the database connection
?>