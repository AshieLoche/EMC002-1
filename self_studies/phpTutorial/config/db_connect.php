<?php

    // MySQLi or PDO
    $host = 'localhost';
    $username = 'ashie';
    $password = 'test12345';
    $db_name = 'ninja_pizza';

    // Connect to Database
    $conn = mysqli_connect($host, $username, $password, $db_name);

    // Check Connection
    if (!$conn) {
        echo 'Connection error:' . mysqli_connect_error();
    }

?>