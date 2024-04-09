<?php
    include '../php/dbconnection.php'; // Include the database connection file to connect to the database

    // Retrieve contact details sent from the client side via POST request
    $name =  $_POST["name"];
    $email =  $_POST["email"];
    $phone =  $_POST["phone"];
    $address =  $_POST["address"];

    $sql = "SELECT MAX(id) FROM contacts"; // SQL query to find the highest (maximum) ID number in the contacts table to decide next ID for the new contact

    $result = $conn->query($sql);// Execute the SQL query and store the result

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $nextID = $row["MAX(id)"]+1; // Calculate the next ID by adding 1 to the maximum ID found
        }
    } else {
        echo "0";
    }

    // Prepare SQL query to insert the new contact details into the contacts table
    $sql_query="INSERT INTO contacts VALUES ($nextID,'$name','$email','$phone','$address') ";

    if ($conn->query($sql_query)==TRUE) {
      echo "Contact saved successfully!";
    }else{
        echo "Error: Contact didn't saved";
    }

    $conn->close(); // Close the database connection
?>