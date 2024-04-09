<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Ensures proper rendering and touch zooming for mobile devices -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Preconnects to Google Fonts for faster loading -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet"> <!-- Google Fonts link for Roboto font with different weights -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- FontAwesome for icons -->
    <link rel="icon" type="image/x-icon" href="./assets/images/logo.png"> <!-- Link to favicon -->

    <link rel="stylesheet" href="css/style.css"> <!-- Link to external CSS for styling -->

    <title>Contact Management System</title>
</head>
<body>
    <!-- Header section with logo and title -->
    <header class="Title-bar row">
        <img src="./assets/images/logo.png" alt="logo" class="logo">
        <h1>Contact Management System</h1>
    </header>

    <!-- Main container for contact list and details -->
    <div class="main-container container row">
        <div class="left-panel container col"> <!-- Left panel for contact list and search/add controls -->
            
            <!-- Search bar and add contact button -->
            <div class="controls container row"> 
                <div class="search-bar row">
                    <button class="filter-all" onclick="load_all_contacts()"><i class="fa fa-sort-alpha-asc"></i></button> <!-- Filter/sort button -->
                    <input type="text" name="txt_search" id="txt_search" placeholder="Search" onkeyup="search_contact()" > <!-- Search input -->
                </div>
                <button class="btn-add-contact" onclick="contact_form()"><i class="fa fa-plus"></i></button> <!-- Button to open add contact form -->
            </div>

            <!-- Container for the list of contacts -->
            <div class="contact-list container col" id="contact_list">
                <!-- PHP script to load contacts from the database -->
                <?php
                    include './php/dbconnection.php';
                    $sqlQuery = "SELECT * FROM contacts ORDER BY id ASC";
                    $result = $conn->query($sqlQuery);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "
                                <div class='contact-list-item container row' id='".$row["id"]."' onclick='load_contact_details(this.id)'>
                                    <img src='./data/contact_photos/user.png' alt='' class='contact-photo'>
                                    <h3 class='contact-name'>".$row["name"]."</h3>
                                </div>
                            ";
                        }
                    } else {
                        echo "<h1>Error while loading</h1>";
                    }
                    $conn->close();
                ?>
            </div>
        </div>
        <div class="vl"></div> <!-- vertical line for separation -->

        <!-- Container for displaying the details of a selected contact -->
        <div class="details-container  col" id="details_container">
            <div class="contact-details container col" id="contact_details">

                <!-- Placeholder content when no contact is selected -->
                <div class="empty-note col">
                    <img src="./assets/images/contact-book.png" alt="" >
                    <h3>No contact selected</h3>
                </div>

            </div>
        </div>
    </div>
    <script src="./js/main.js"></script> <!-- Link to JavaScript file for dynamic functionality -->
</body>
</html>