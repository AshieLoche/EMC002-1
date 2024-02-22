<?php

    require 'db_create.php';

    // Connect to Database
    $conn = mysqli_connect($host, $user , $password, $db_name);

    // Check Connection
    if (!$conn) {
        die('Connection failed: ' . $conn->connect_error);
    }
    
?>