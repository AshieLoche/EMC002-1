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
                    if (strpos($fetched[0]["Grants for $user@$host"], 'USAGE') != false) {
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
    function create($root, $target, $tblName = null, $tblContent = null, $host, $user, $password, $db_name) {

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
            } else if ($tblName == 'role') {
                $cols = '(role)';
            } else if ($tblName == 'account') {
                $cols = '(role_id, username, email, password, fname, lname, mobile, bday)';
            }

            $query = "INSERT INTO $tblName $cols $tblContent";

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
    description LONGTEXT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (species_id) REFERENCES species (id)";

    check(false, 'tbl', 'pokemon', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    $tblContent = "id INT AUTO_INCREMENT,
    role VARCHAR(255) UNIQUE NOT NULL,
    PRIMARY KEY (id)";

    check(false, 'tbl', 'role', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    $tblContent = "id INT AUTO_INCREMENT,
    role_id INT NOT NULL,
    username VARCHAR(255) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL CHECK (email REGEXP '^.+@+.+$'),
    password VARCHAR(255) UNIQUE NOT NULL,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    mobile VARCHAR(13) UNIQUE NOT NULL CHECK (mobile REGEXP '^[0-9]{12}$'),
    bday DATE NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (role_id) REFERENCES role (id)";

    check(false, 'tbl', 'account', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    $tblContent = "VALUES
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
    SELECT 'Chandelure', type1.id, type2.id
    FROM pokedopt.type as type1
    INNER JOIN pokedopt.type as type2 ON type2.type = 'FIRE'
    WHERE type1.type = 'GHOST'
    UNION ALL
    SELECT 'Gengar', type1.id, type2.id
    FROM pokedopt.type as type1
    INNER JOIN pokedopt.type as type2 ON type2.type = 'POISON'
    WHERE type1.type = 'GHOST'
    UNION ALL
    SELECT 'Magnezone', type1.id, type2.id
    FROM pokedopt.type as type1
    INNER JOIN pokedopt.type as type2 ON type2.type = 'STEEL'
    WHERE type1.type = 'ELECTRIC'
    UNION ALL
    SELECT 'Dragonite', type1.id, type2.id
    FROM pokedopt.type as type1
    INNER JOIN pokedopt.type as type2 ON type2.type = 'FLYING'
    WHERE type1.type = 'DRAGON'
    UNION ALL
    SELECT 'Lugia', type1.id, type2.id
    FROM pokedopt.type as type1
    INNER JOIN pokedopt.type as type2 ON type2.type = 'FLYING'
    WHERE type1.type = 'PSYCHIC'
    UNION ALL
    SELECT 'Incineroar', type1.id, type2.id
    FROM pokedopt.type as type1
    INNER JOIN pokedopt.type as type2 ON type2.type = 'DARK'
    WHERE type1.type = 'FIRE'
    UNION ALL
    SELECT 'Dusknoir', type1.id, type2.id
    FROM pokedopt.type as type1
    INNER JOIN pokedopt.type as type2 ON type2.type = 'NULL'
    WHERE type1.type = 'GHOST'
    UNION ALL
    SELECT 'Prinplup', type1.id, type2.id
    FROM pokedopt.type as type1
    INNER JOIN pokedopt.type as type2 ON type2.type = 'NULL'
    WHERE type1.type = 'WATER'
    UNION ALL
    SELECT 'Koraidon', type1.id, type2.id
    FROM pokedopt.type as type1
    INNER JOIN pokedopt.type as type2 ON type2.type = 'DRAGON'
    WHERE type1.type = 'FIGHTING'";

    check(false, 'col', 'species', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    $tblContent = "
    SELECT '../assets/img/pokemon/chandelure.jpg', 'Amier', id, 'A gentle and emotional pokémon that enjoys floating about in broad daylight anywhere there are flowers.'
    FROM pokedopt.species as species
    WHERE species.species = 'Chandelure'
    UNION ALL
    SELECT '../assets/img/pokemon/gengar.jpg', 'Leiroh', id, 'A creative and shy pokémon that really enjoys some peace and quiet. When disturbed from his artist zone, he will throw a temper tantrum.'
    FROM pokedopt.species as species
    WHERE species.species = 'Gengar'
    UNION ALL
    SELECT '../assets/img/pokemon/magnezone.jpg', 'Paliz', id, 'A cheeky and mischievous pokémon that enjoys shorting out devices but is easily distracted by her favourite food, macaron.'
    FROM pokedopt.species as species
    WHERE species.species = 'Magnezone'
    UNION ALL
    SELECT '../assets/img/pokemon/dragonite.jpg', 'Dergz', id, 'He will hug everything and show his unending affection and love to anything and everything. He does not easily forgive anyone who hurts him or the people and pokémon he cares about. He will not hesitate to protect whatever the cost might be.'
    FROM pokedopt.species as species
    WHERE species.species = 'Dragonite'
    UNION ALL
    SELECT '../assets/img/pokemon/lugia.jpg', 'Teraille', id, 'A Lugia with dwarfism and is very proud of it. He flies about quickly and freely, enjoying how more agile he is due to being smaller and how he can go to places where normal Lugias can’t usually go.'
    FROM pokedopt.species as species
    WHERE species.species = 'Lugia'
    UNION ALL
    SELECT '../assets/img/pokemon/incineroar.jpg', 'Ohnerion', id, 'A fiesty and stubborn pokémon, it will take a lot before he start to trust another. But once earning his trust, you might be smothering by tons of affectionate play that might end up with you being scorched or pumelled around with love.'
    FROM pokedopt.species as species
    WHERE species.species = 'Incineroar'";

    check(false, 'col', 'pokemon', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    $tblContent = "VALUES
    ('admin'),
    ('staff'),
    ('user')";

    check(false, 'col', 'role', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    $tblContent = "
    SELECT id, 'Ashie_Loche', 'ashie.loche@pokedopt.com', PASSWORD('ThisIsMyPokedoptYIPPIE!!!<3'), 'Ashie', 'Loche', '649123456789', 12/09/02
    FROM role
    WHERE role = 'admin'";

    check(false, 'col', 'account', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

// Hash the password
$password = 'ThisIsMyPokedoptYIPPIE!!!<3';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Store the hashed password in the database

// Later, verify the password
$input_password = 'ThisIsMyPokedoptYIPPIE!!!<3';
if (password_verify($input_password, $hashed_password)) {
    echo 'Password is correct';
} else {
    echo 'Password is incorrect';
}

?>