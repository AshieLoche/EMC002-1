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

        } else {
            
            // Check if Database Exists
            $sql = "SELECT User FROM mysql.user WHERE User = 'ashie'";

            // SQL Check
            if (!mysqli_query($conn, $sql)) {

                die('Query error: ' . mysqli_error($conn));

            } else {

                // Make Query & Get Result
                $result = mysqli_query($conn, $sql);
    
                // Fetch the Resulting Rows as an Array
                $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
                // Free results From Memory
                mysqli_free_result($result);

                // User Function
                if (empty($user)) {
                    user($conn);
                }

            }

            // Close Connection
            mysqli_close($conn);
        
        }

        // New User
        $user = 'ashie';
        $password = 'ThisIsMyDBYIPPIE!!!<3';

        function user($conn) {

            global $user;
            $user = 'ashie';
            global $password;
            $password = 'ThisIsMyDBYIPPIE!!!<3';
    
            // // Drop User
            // $sql = "DROP USER IF EXISTS '{$user}'@'localhost'";
        
            // // SQL Check
            // if (!mysqli_query($conn, $sql)) {
            //     die('Query error: ' . mysqli_error($conn));
            // }
    
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
            
        }

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

        } else {
            
            // Check if Database Exists
            $sql = "SHOW DATABASES WHERE `Database` = '$db_name'";

            // SQL Check
            if (!mysqli_query($conn, $sql)) {
                die('Query error: ' . mysqli_error($conn));
            } else {
                // Make Query & Get Result
                $result = mysqli_query($conn, $sql);
    
                // Fetch the Resulting Rows as an Array
                $db = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
                // Free results From Memory
                mysqli_free_result($result);

                // Database Function
                if (empty($db)) {
                    database($db_name, $conn);
                }
            }

            // Close Connection
            mysqli_close($conn);
        
        }

        function database($db_name, $conn) {
            
            // // Drop Database
            // $sql = "DROP DATABASE IF EXISTS $db_name";
    
            // // SQL Check
            // if (!mysqli_query($conn, $sql)) {
            //     die('Query error: ' . mysqli_error($conn));
            // }
    
            // Create Database
            $sql = "CREATE DATABASE IF NOT EXISTS {$db_name}";
    
            // SQL Check
            if (!mysqli_query($conn, $sql)) {
                die('Query error: ' . mysqli_error($conn));
            }
            
        }

    }
    
    // Type Table
    {

        $typeTable = 'type';

        // Connect to Database
        $conn = mysqli_connect($host, $user , $password, $db_name);

        // Check Connection
        if (!$conn) {

            die('Connection failed: ' . $conn->connect_error);

        } else {
            
            // Check if Type Table Exists
            $sql = "SHOW TABLES LIKE '$typeTable'";

            // SQL Check
            if (!mysqli_query($conn, $sql)) {
                die('Query error: ' . mysqli_error($conn));
            } else {
                // Make Query & Get Result
                $result = mysqli_query($conn, $sql);

                // Fetch the Resulting Rows as an Array
                $type = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // Free results From Memory
                mysqli_free_result($result);

                // Type Function
                if (empty($type)) {
                    type($typeTable, $conn);
                }
            }

            // Close Connection
            mysqli_close($conn);

        }

        function type($typeTable, $conn) {
    
            // Create Type Table
            $sql = 
            "CREATE TABLE IF NOT EXISTS $typeTable (
                id INT AUTO_INCREMENT,
                type VARCHAR(255) CHECK (type in ('FIRE', 'WATER', 'ELECTRIC', 'GRASS', 'ICE', 'FIGHTING', 'POISON', 'GROUND', 'FLYING', 'PSYCHIC', 'BUG', 'NORMAL', 'ROCK', 'GHOST', 'DRAGON', 'DARK', 'STEEL', 'FAIRY', 'NULL')),
                img VARCHAR(255),
                PRIMARY KEY (id)
            )";
    
            // SQL Check
            if (!mysqli_query($conn, $sql)) {
                die('Query error: ' . mysqli_error($conn));
            }
    
            // Insert Type Data
            $sql = 
            "INSERT INTO $typeTable (type, img)
            VALUES
                ('FIRE', '../assets/img/types/fire.jpg'),
                ('WATER', '../assets/img/types/water.jpg'),
                ('ELECTRIC', '../assets/img/types/electric.jpg'),
                ('GRASS', '../assets/img/types/grass.jpg'),
                ('ICE', '../assets/img/types/ice.jpg'),
                ('FIGHTING', '../assets/img/types/fighting.jpg'),
                ('POISON', '../week8/assets/img/types/poison.jpg'),
                ('GROUND', '../week8/assets/img/types/ground.jpg'),
                ('FLYING', '../week8/assets/img/types/flying.jpg'),
                ('PSYCHIC', '../week8/assets/img/types/psychic.jpg'),
                ('BUG', '../week8/assets/img/types/bug.jpg'),
                ('NORMAL', '../week8/assets/img/types/normal.jpg'),
                ('ROCK', '../week8/assets/img/types/rock.jpg'),
                ('GHOST', '../week8/assets/img/types/ghost.jpg'),
                ('DRAGON', '../week8/assets/img/types/dragon.jpg'),
                ('DARK', '../week8/assets/img/types/dark.jpg'),
                ('STEEL', '../week8/assets/img/types/steel.jpg'),
                ('FAIRY', '../week8/assets/img/types/fairy.jpg'),
                ('NULL', '')";
    
            // SQL Check
            if (!mysqli_query($conn, $sql)) {
                die('Query error: ' . mysqli_error($conn));
            }

        }

    }

    // Species Table
    {

        $speciesTable = 'species';

        // Connect to Database
        $conn = mysqli_connect($host, $user , $password, $db_name);

        // Check Connection
        if (!$conn) {

            die('Connection failed: ' . $conn->connect_error);

        } else {
            
            // Check if Species Table Exists
            $sql = "SHOW TABLES LIKE '$speciesTable'";

            // SQL Check
            if (!mysqli_query($conn, $sql)) {
                die('Query error: ' . mysqli_error($conn));
            } else {
                // Make Query & Get Result
                $result = mysqli_query($conn, $sql);

                // Fetch the Resulting Rows as an Array
                $type = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // Free results From Memory
                mysqli_free_result($result);

                // Species Function
                if (empty($type)) {
                    species($speciesTable, $typeTable, $conn);
                }
            }

            // Close Connection
            mysqli_close($conn);

        }

        function species($speciesTable, $typeTable, $conn) {

            // Create Species table
            $sql = 
            "CREATE TABLE IF NOT EXISTS $speciesTable (
                id INT AUTO_INCREMENT,
                species VARCHAR(255) UNIQUE NOT NULL,
                type1_id INT NOT NULL,
                type2_id INT NOT NULL CHECK (type2_id != type1_id),
                PRIMARY KEY (id),
                FOREIGN KEY (type1_id) REFERENCES $typeTable (id),
                FOREIGN KEY (type2_id) REFERENCES $typeTable (id)
            )";
    
            // SQL Check
            if (!mysqli_query($conn, $sql)) {
                die('Query error: ' . mysqli_error($conn));
            }
    
            // Insert Species Data
            $sql = 
            "INSERT INTO $speciesTable (species, type1_id, type2_id)
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

        }

    }
    
    // Pokemon Table
    {

        $pokemonTable = 'pokemon';

        // Connect to Database
        $conn = mysqli_connect($host, $user , $password, $db_name);

        // Check Connection
        if (!$conn) {

            die('Connection failed: ' . $conn->connect_error);

        } else {
            
            // Check if Species Table Exists
            $sql = "SHOW TABLES LIKE '$pokemonTable'";

            // SQL Check
            if (!mysqli_query($conn, $sql)) {
                die('Query error: ' . mysqli_error($conn));
            } else {
                // Make Query & Get Result
                $result = mysqli_query($conn, $sql);

                // Fetch the Resulting Rows as an Array
                $type = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // Free results From Memory
                mysqli_free_result($result);

                // Species Function
                if (empty($type)) {
                    pokemon($pokemonTable, $speciesTable, $typeTable, $conn);
                }
            }

            // Close Connection
            mysqli_close($conn);

        }

        function pokemon($pokemonTable, $speciesTable, $typeTable, $conn) {
            
            // Create Pokemon table
            $sql = 
            "CREATE TABLE IF NOT EXISTS $pokemonTable (
                id INT AUTO_INCREMENT,
                img LONGBLOB NOT NULL,
                name VARCHAR(255) NOT NULL,
                species_id INT,
                description  LONGTEXT NOT NULL,
                PRIMARY KEY (id),
                FOREIGN KEY (species_id) REFERENCES $speciesTable (id)
            )";

            // SQL Check
            if (!mysqli_query($conn, $sql)) {
                die('Query error: ' . mysqli_error($conn));
            }

            // Insert Pokemon Data
            $sql = 
            "INSERT INTO $pokemonTable (img, name, species_id, description)
            VALUES
                (LOAD_FILE('/xampp/htdocs/EMC002-1/week8/assets/img/pokemon/chandelure.jpg'), 'Amier', '1', 'A gentle and emotional pokémon that enjoys floating about in broad daylight anywhere there are flowers.'),
                (LOAD_FILE('/xampp/htdocs/EMC002-1/week8/assets/img/pokemon/gengar.jpg'), 'Leiroh', '2', 'A creative and shy pokémon that really enjoys some peace and quiet. When disturbed from his artist zone, he will throw a temper tantrum.'),
                (LOAD_FILE('/xampp/htdocs/EMC002-1/week8/assets/img/pokemon/magnezone.jpg'), 'Paliz', '3', 'A cheeky and mischievous pokémon that enjoys shorting out devices but is easily distracted by her favourite food, macaron.'),
                (LOAD_FILE('/xampp/htdocs/EMC002-1/week8/assets/img/pokemon/dragonite.jpg'), 'Dergz', '4', 'He will hug everything and show his unending affection and love to anything and everything. He does not easily forgive anyone who hurts him or the people and pokémon he cares about. He will not hesitate to protect whatever the cost might be.'),
                (LOAD_FILE('/xampp/htdocs/EMC002-1/week8/assets/img/pokemon/lugia.jpg'), 'Teraille', '5', 'A Lugia with dwarfism and is very proud of it. He flies about quickly and freely, enjoying how more agile he is due to being smaller and how he can go to places where normal Lugias can’t usually go.'),
                (LOAD_FILE('/xampp/htdocs/EMC002-1/week8/assets/img/pokemon/incineroar.jpg'), 'Ohnerion', '6', 'A fiesty and stubborn pokémon, it will take a lot before he start to trust another. But once earning his trust, you might be smothering by tons of affectionate play that might end up with you being scorched or pumelled around with love.')";

            // SQL Check
            if (!mysqli_query($conn, $sql)) {
                die('Query error: ' . mysqli_error($conn));
            }

        }

    }

?>