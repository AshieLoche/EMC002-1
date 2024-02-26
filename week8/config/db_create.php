<?php

    // Check if existing in Database
    function check($root, $target, $tblName = null, $tblContent = null, $host, $user, $password, $db_name) {

        // Connect to Database
        if ($root) {
            $conn = mysqli_connect('localhost', 'root', '', 'mysql');
        } else {
            $conn = ($target == 'db') ? mysqli_connect($host, $user, $password, 'mysql') : mysqli_connect($host, $user, $password, $db_name);
        }
        // Connect to Database

        // Check Target
        if ($target == 'user') {

            $query = "SELECT Host, User, Password FROM $db_name.user WHERE Host = '$host' AND User = '$user' AND Password = PASSWORD('$password')";

        } else if ($target == 'grants') {

            $query = "SHOW GRANTS FOR '$user'@'$host'";

        } else if ($target == 'db') {

            $query = "SHOW DATABASES WHERE `Database` = '$db_name'";
            
        } else if ($target == 'tbl') {

            $query = "SHOW TABLES";
            
        } else if ($target == 'col') {

            $query = "SELECT * FROM $tblName";
            
        }
        // Check Target

        // Check Database Connection
        if (!$conn) {

            die('Connection Failed: ' . $conn->connect_error);

        } else {
            
            // Execute and Check Query
            if (!mysqli_query($conn, $query)) {

                die('Query Error: ' . mysqli_error($conn));

            } else {

                // Get Results
                $result = mysqli_query($conn, $query);

                // Fetch Results to a Dictionary
                $fetched = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // Free Results
                mysqli_free_result($result);

                // Create New Instance
                if (empty($fetched)) {
                    create($root, $target, $tblName, $tblContent, $host, $user, $password, $db_name);
                } else if ($target == 'grants') {
                    if (strpos($fetched[0]['Grants for ashie@localhost'], 'USAGE') != false) {
                        create($root, $target, $tblName, $tblContent, $host, $user, $password, $db_name);
                    }
                } else if ($target == 'tbl') {
                    $tblCheck;

                    foreach ($fetched as $field) {
                        if ($field['Tables_in_pokedopt'] == $tblName) {
                            $tblCheck = true;
                            break;
                        } else {
                            $tblCheck = false;
                            continue;
                        }
                    }

                    if(!$tblCheck) {
                        create($root, $target, $tblName, $tblContent, $host, $user, $password, $db_name);
                    }
                }
                // Create New Instance

            }
            // Execute and Check Query

            // Close Connection
            mysqli_close($conn);

        }
        // Check Database Connection

    }
    // Check if existing in Database

    // Create in DAtabase
    function create($root, $target, $tblName = null, $tblContent = null,$host, $user, $password, $db_name) {

        // Connect to Database
        if ($root) {
            $conn = mysqli_connect('localhost', 'root', '', 'mysql');
        } else {
            $conn = ($target == 'db') ? mysqli_connect($host, $user, $password, 'mysql') : mysqli_connect($host, $user, $password, $db_name);
        }
        // Connect to Database

        // Check Target
        if ($target == 'user') {

            $query = "CREATE USER IF NOT EXISTS '{$user}'@'{$host}' IDENTIFIED BY '{$password}'";

        } else if ($target == 'grants') {

            $query = "GRANT ALL PRIVILEGES ON *.* TO '{$user}'@'{$host}' WITH GRANT OPTION";

        } else if ($target == 'db') {

            $query = "CREATE DATABASE IF NOT EXISTS {$db_name}";
            
        } else if ($target == 'tbl') {

            $query = "CREATE TABLE IF NOT EXISTS $tblName ($tblContent)";
            
        } else if ($target == 'col') {
            
            if ($tblName == 'type') {
                $cols = '(type, img)';
            } else if  ($tblName == 'species') {
                $cols = '(species, type1_id, type2_id)';
            } else if ($tblName == 'pokemon') {
                $cols = '(img, name, species_id, description)';
            }

            $query = "INSERT INTO $tblName $cols VALUES $tblContent";

        }
        // Check Target

        // Check Database Connection
        if (!$conn) {

            die('Connection Failed: ' . $conn->connect_error);

        } else {
                    
            if (!mysqli_query($conn, $query)) {
                die('Query Error: ' . mysqli_error($conn));
            }

            // Close Connection
            mysqli_close($conn);

        }
        // Check Database Connection

    }

    check(true, 'user', null, null,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'mysql');

    check(true, 'grants', null, null, 'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'mysql');

    check(false, 'db', null, null, 'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    $tblContent = "id INT AUTO_INCREMENT,
    type VARCHAR(255) CHECK (type in ('FIRE', 'WATER', 'ELECTRIC', 'GRASS', 'ICE', 'FIGHTING', 'POISON', 'GROUND', 'FLYING', 'PSYCHIC', 'BUG', 'NORMAL', 'ROCK', 'GHOST', 'DRAGON', 'DARK', 'STEEL', 'FAIRY', 'NULL')),
    img VARCHAR(255),
    PRIMARY KEY (id)";

    check(false, 'tbl', 'type', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    $tblContent = "id INT AUTO_INCREMENT,
    species VARCHAR(255) UNIQUE NOT NULL,
    type1_id INT NOT NULL,
    type2_id INT NOT NULL CHECK (type2_id != type1_id),
    PRIMARY KEY (id),
    FOREIGN KEY (type1_id) REFERENCES type (id),
    FOREIGN KEY (type2_id) REFERENCES type (id)";
    
    check(false, 'tbl', 'species', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    $tblContent = "id INT AUTO_INCREMENT,
    img VARCHAR(255),
    name VARCHAR(255) NOT NULL,
    species_id INT,
    description  LONGTEXT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (species_id) REFERENCES species (id)";

    check(false, 'tbl', 'pokemon', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    $tblContent = "
    ('FIRE', '../assets/img/types/fire.jpg'),
    ('WATER', '../assets/img/types/water.jpg'),
    ('ELECTRIC', '../assets/img/types/electric.jpg'),
    ('GRASS', '../assets/img/types/grass.jpg'),
    ('ICE', '../assets/img/types/ice.jpg'),
    ('FIGHTING', '../assets/img/types/fighting.jpg'),
    ('POISON', '..assets/img/types/poison.jpg'),
    ('GROUND', '..assets/img/types/ground.jpg'),
    ('FLYING', '..assets/img/types/flying.jpg'),
    ('PSYCHIC', '../assets/img/types/psychic.jpg'),
    ('BUG', '../assets/img/types/bug.jpg'),
    ('NORMAL', '../assets/img/types/normal.jpg'),
    ('ROCK', '../assets/img/types/rock.jpg'),
    ('GHOST', '../assets/img/types/ghost.jpg'),
    ('DRAGON', '../assets/img/types/dragon.jpg'),
    ('DARK', '../assets/img/types/dark.jpg'),
    ('STEEL', '../assets/img/types/steel.jpg'),
    ('FAIRY', '../assets/img/types/fairy.jpg'),
    ('NULL', '')";
    
    check(false, 'col', 'type', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    $tblContent = "
    ('Chandelure', '14', '1'),
    ('Gengar', '14', '7'),
    ('Magnezone', '3', '17'),
    ('Dragonite', '15', '9'),
    ('Lugia', '10', '9'),
    ('Incineroar', '1', '16')";

    check(false, 'col', 'species', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    $tblContent = "
    ('../assets/img/pokemon/chandelure.jpg', 'Amier', '1', 'A gentle and emotional pokémon that enjoys floating about in broad daylight anywhere there are flowers.'),
    ('../assets/img/pokemon/gengar.jpg', 'Leiroh', '2', 'A creative and shy pokémon that really enjoys some peace and quiet. When disturbed from his artist zone, he will throw a temper tantrum.'),
    ('../assets/img/pokemon/magnezone.jpg', 'Paliz', '3', 'A cheeky and mischievous pokémon that enjoys shorting out devices but is easily distracted by her favourite food, macaron.'),
    ('../assets/img/pokemon/dragonite.jpg', 'Dergz', '4', 'He will hug everything and show his unending affection and love to anything and everything. He does not easily forgive anyone who hurts him or the people and pokémon he cares about. He will not hesitate to protect whatever the cost might be.'),
    ('../assets/img/pokemon/lugia.jpg', 'Teraille', '5', 'A Lugia with dwarfism and is very proud of it. He flies about quickly and freely, enjoying how more agile he is due to being smaller and how he can go to places where normal Lugias can’t usually go.'),
    ('../assets/img/pokemon/incineroar.jpg', 'Ohnerion', '6', 'A fiesty and stubborn pokémon, it will take a lot before he start to trust another. But once earning his trust, you might be smothering by tons of affectionate play that might end up with you being scorched or pumelled around with love.')";

    check(false, 'col', 'pokemon', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

?>