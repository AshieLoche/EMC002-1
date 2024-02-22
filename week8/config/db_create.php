<?php

    // CREATE USER
    {

        // Old User
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'mysql';

        // Connect to Database
        $conn = mysqli_connect($host, $user , $password, $db_name);
    
        // Check Connection
        if (!$conn) {
            die('Connection failed: ' . $conn->connect_error);
        }
        
        // New User
        $user = 'ashie';
        $password = 'ThisIsMyDBYIPPIE!!!<3';

        // Drop User
        $sql = "DROP USER IF EXISTS '{$user}'@'localhost'";
    
        // SQL Check
        if (!mysqli_query($conn, $sql)) {
            die('Query error: ' . mysqli_error($conn));
        }

        // Create User
        $sql = "CREATE USER IF NOT EXISTS '{$user}'@'localhost' IDENTIFIED BY '{$password}'";

        // SQL Check
        if (!mysqli_query($conn, $sql)) {
            die('Query error: ' . mysqli_error($conn));
        }
    
        // Grant Privileges
        $sql = "GRANT ALL PRIVILEGES ON *.* TO '{$user}'@'localhost' WITH GRANT OPTION";
    
        // SQL Check
        if (!mysqli_query($conn, $sql)) {
            die('Query error: ' . mysqli_error($conn));
        }

        // Close Connection
        mysqli_close($conn);

    }

    // CREATE DATABASE
    {

        // User
        $host = 'localhost';
        $user = 'ashie';
        $password = 'ThisIsMyDBYIPPIE!!!<3';
        $db_name = 'pokedopt';

        // Connect to Database
        $conn = mysqli_connect($host, $user , $password);
    
        // Check Connection
        if (!$conn) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Drop Database
        $sql = "DROP DATABASE IF EXISTS $db_name";

        // SQL Check
        if (!mysqli_query($conn, $sql)) {
            die('Query error: ' . mysqli_error($conn));
        }

        // Create Database
        $sql = "CREATE DATABASE IF NOT EXISTS {$db_name}";

        // SQL Check
        if (!mysqli_query($conn, $sql)) {
            die('Query error: ' . mysqli_error($conn));
        }

        // Close Connection
        mysqli_close($conn);

    }

    // Type Table
    {

        // Connect to Database
        $conn = mysqli_connect($host, $user , $password, $db_name);
    
        // Check Connection
        if (!$conn) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Create Type Table
        $sql = 
        "CREATE TABLE IF NOT EXISTS pokedopt.type (
            id INT AUTO_INCREMENT,
            type VARCHAR(255) CHECK (type in ('FIRE', 'WATER', 'ELECTRIC', 'GRASS', 'ICE', 'FIGHTING', 'POISON', 'GROUND', 'FLYING', 'PSYCHIC', 'BUG', 'NORMAL', 'ROCK', 'GHOST', 'DRAGON', 'DARK', 'STEEL', 'FAIRY', 'STELLAR')),
            PRIMARY KEY (id)
        )";

        // SQL Check
        if (!mysqli_query($conn, $sql)) {
            die('Query error: ' . mysqli_error($conn));
        }

        // Insert Type Data
        $sql = 
        "INSERT INTO pokedopt.type (type)
        VALUES
            ('FIRE'), ('WATER'), ('ELECTRIC'), ('GRASS'), ('ICE'), ('FIGHTING'), ('POISON'), ('GROUND'), ('FLYING'), ('PSYCHIC'), ('BUG'), ('NORMAL'), ('ROCK'), ('GHOST'), ('DRAGON'), ('DARK'), ('STEEL'), ('FAIRY'), ('STELLAR')";

        // SQL Check
        if (!mysqli_query($conn, $sql)) {
            die('Query error: ' . mysqli_error($conn));
        }

        // Close Connection
        mysqli_close($conn);

    }
    
    // Species Table
    {

        // Connect to Database
        $conn = mysqli_connect($host, $user , $password, $db_name);
    
        // Check Connection
        if (!$conn) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Create Species table
        $sql = 
        "CREATE TABLE IF NOT EXISTS pokedopt.species (
            id INT AUTO_INCREMENT,
            species VARCHAR(255) UNIQUE,
            type1_id INT,
            type2_id INT CHECK (type2_id != type1_id) ,
            PRIMARY KEY (id),
            FOREIGN KEY (type1_id) REFERENCES pokedopt.type (id),
            FOREIGN KEY (type2_id) REFERENCES pokedopt.type (id)
        )";

        // SQL Check
        if (!mysqli_query($conn, $sql)) {
            die('Query error: ' . mysqli_error($conn));
        }

        // Insert Species Data
        $sql = 
        "INSERT INTO pokedopt.species (species, type1_id, type2_id)
        VALUES
            ('Chandelure', '14', '1'),
            ('Gengar', '14', '7'),
            ('Magnezone', '3', '17'),
            ('Dragonite', '15', '9'),
            ('Lugia', '10', '9'),
            ('Incineroar', '1', '16')";

        // SQL Check
        if (!mysqli_query($conn, $sql)) {
            die('Query error: ' . mysqli_error($conn));
        }

        // Close Connection
        mysqli_close($conn);

    }
    
    // Pokemon Table
    {

        // Connect to Database
        $conn = mysqli_connect($host, $user , $password, $db_name);
    
        // Check Connection
        if (!$conn) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Create Pokemon table
        $sql = 
        "CREATE TABLE IF NOT EXISTS pokedopt.pokemon (
            id INT AUTO_INCREMENT,
            img LONGBLOB NOT NULL,
            name VARCHAR(255),
            species_id INT,
            PRIMARY KEY (id),
            FOREIGN KEY (species_id) REFERENCES pokedopt.species (id)
        )";

        // SQL Check
        if (!mysqli_query($conn, $sql)) {
            die('Query error: ' . mysqli_error($conn));
        }

        // Insert Pokemon Data
        $sql = 
        "INSERT INTO pokedopt.pokemon (img, name, species_id)
        VALUES
            (LOAD_FILE('/xampp/htdocs/EMC002-1/week8/assets/img/chandelure.jpg'), 'Amier', '1'),
            (LOAD_FILE('/xampp/htdocs/EMC002-1/week8/assets/img/gengar.jpg'), 'Leiroh', '2'),
            (LOAD_FILE('/xampp/htdocs/EMC002-1/week8/assets/img/magnezone.jpg'), 'Paliz', '3'),
            (LOAD_FILE('/xampp/htdocs/EMC002-1/week8/assets/img/dragonite.jpg'), 'Dergz', '4'),
            (LOAD_FILE('/xampp/htdocs/EMC002-1/week8/assets/img/lugia.jpg'), 'Teraille', '5'),
            (LOAD_FILE('/xampp/htdocs/EMC002-1/week8/assets/img/incineroar.jpg'), 'Ohnerion', '6')";

        // SQL Check
        if (!mysqli_query($conn, $sql)) {
            die('Query error: ' . mysqli_error($conn));
        }

        // Close Connection
        mysqli_close($conn);

    }

?>