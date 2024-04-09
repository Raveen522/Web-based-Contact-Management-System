<?php
    //Credentials for server connection and DB connection
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "contact_manager";

    // Create connection
    $conn = new mysqli($serverName, $userName, $password, $dbName);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>