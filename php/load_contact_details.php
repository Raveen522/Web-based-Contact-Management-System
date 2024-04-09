<?php
    include '../php/dbconnection.php';// Include the database connection file to connect to the database

    $contact_ID =  $_POST["contactId"]; // Retrieve the contact ID sent via POST request
    $sqlQuery = "SELECT * FROM contacts WHERE id=$contact_ID"; // Prepare SQL query to select all columns from 'contacts' where the ID matches the provided contact ID
    $result = $conn->query($sqlQuery); // Execute the query and store the result

    // Start of the form HTML markup; the form won't submit traditionally due to 'return false' onsubmit event
    echo "
        <form onsubmit='return false'>
            <div class='controls'>
                <button class='btn-back' onclick='go_back()'><i class='fa fa-chevron-left' aria-hidden='true'></i></button>
            </div>
    ";

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Echo out the contact details within HTML elements, including name, email, phone, and address
            // Inputs are initially disabled for read-only purposes; they can be enabled for editing
            echo "
                <div class='basic-details-container container row'>
                    <div class='contact-title col'>
                        <h3 class='contact-name'>".$row["name"]."</h3>
                    </div>
                </div>

                <table class='details'>
                    <tr>
                        <td class='detail-caption'>Full Name</td>
                        <td class='detail-content'><input type='text' name='txt_full_name' id='txt_full_name' value='".$row["name"]."' disabled></td>
                    </tr>
                    <tr>
                        <td class='detail-caption'>Email Address</td>
                        <td class='detail-content'><input type='email' name='email_address' id='email_address' value='".$row["email"]."' disabled></td>
                    </tr>
                    <tr>
                        <td class='detail-caption'>Mobile number</td>
                        <td class='detail-content'><input type='text' name='txt_mobile_number' id='txt_mobile_number' value='".$row["phone"]."' disabled></td>
                    </tr>
                    <tr>
                        <td class='detail-caption'>Address</td>
                        <td class='detail-content'>
                            <textarea name='txt_address' id='txt_address' cols='30' rows='5' disabled>".$row["address"]."</textarea>
                        </td>
                    </tr>
                </table>

                <div class='controls'>
                    <button onclick='enable_fields()'>Edit</button>
                    <button id='btn_update' onclick='update_contact(".$row["id"].")' disabled>Update</button>
                    <button id ='btn_delete'onclick='delete_contact(".$row["id"].")' disabled>Delete</button>
                </div>
                </form>
            ";
        }
    } else {
        echo "<h1>Error while loading</h1>";
    }
    $conn->close(); // Close the database connection
?>