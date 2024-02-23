<?php

    require 'db_create.php';

    $host = 'localhost';
    $user = 'ashie';
    $password = 'ThisIsMyDBYIPPIE!!!<3';
    $db_name = 'pokedopt';

    // Connect to Database
    $conn = mysqli_connect($host, $user , $password, $db_name);

    // Check Connection
    if (!$conn) {
        die('Connection failed: ' . $conn->connect_error);
    }
    
?>