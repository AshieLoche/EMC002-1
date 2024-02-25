<?php


// // Hash a new password
// $new_password = 'mynewpasswordtext';
// $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// // Later, verify the password
// $entered_password = 'mynewpasswordtext';
// if (password_verify($entered_password, $hashed_password)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password!';
// }

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

            $query = "SHOW GRANTS FOR '$user'@'localhost'";

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
                    
            if (!mysqli_query($conn, $query)) {
                die('Query Error: ' . mysqli_error($conn));
            } else {
                $result = mysqli_query($conn, $query);

                $fetched = mysqli_fetch_all($result, MYSQLI_ASSOC);

                mysqli_free_result($result);

                echo "$target: ";
                print_r($fetched);
                echo '<br>';

                if ($target == 'grants') {
                    if (strpos($fetched[0]['Grants for ashie@localhost'], 'USAGE') != false){
                        echo "$target EMPTY";
                        create($root, $target, $tblName, $tblContent, $host, $user, $password, $db_name);
                    } else {
                        echo "$target NOT EMPTY";
                    }
                } else if ($target == 'tbl') {
                    if (empty($fetched)) {
                        echo "$target EMPTY";
                        create($root, $target, $tblName, $tblContent, $host, $user, $password, $db_name);
                    } else {
                        echo "$target NOT EMPTY";
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
                            echo "$tblName DOEST NOT EXIST";
                            create($root, $target, $tblName, $tblContent, $host, $user, $password, $db_name);
                        } else {
                            echo "$tblName EXISTS";
                        }
                    }
                } else if ($target == 'col') {
                    if (empty($fetched)) {
                        echo "$target EMPTY";
                        create($root, $target, $tblName, $tblContent, $host, $user, $password, $db_name);
                    } else {
                        echo "$target NOT EMPTY";
                    }
                } else {
                    if (empty($fetched)) {
                        echo "$target EMPTY";
                        create($root, $target, $tblName, $tblContent, $host, $user, $password, $db_name);
                    } else {
                        echo "$target NOT EMPTY";
                    }
                }

            }

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

            $query = "CREATE USER IF NOT EXISTS '{$user}'@'localhost' IDENTIFIED BY '{$password}'";

        } else if ($target == 'grants') {

            $query = "GRANT ALL PRIVILEGES ON *.* TO '{$user}'@'localhost' WITH GRANT OPTION";

        } else if ($target == 'db') {

            $query = "CREATE DATABASE IF NOT EXISTS {$db_name}";
            
        } else if ($target == 'tbl') {

            $query = "CREATE TABLE IF NOT EXISTS $tblName ($tblContent)";
            
        } else if ($target == 'col') {
            
            if ($tblName == 'type') {
                $query = "INSERT INTO $tblName (type, img) VALUES $tblContent";
            } else if  ($tblName == 'species') {
                $query = "INSERT INTO $tblName (species, type1_id, type2_id) VALUES $tblContent";
            } else if ($tblName == 'pokemon') {
                $query = "INSERT INTO $tblName (img, name, species_id, description) VALUES $tblContent";
            }

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

    echo '<br>';
    echo '<br>';
    check(true, 'grants', null, null, 'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'mysql');

    echo '<br>';
    echo '<br>';
    check(false, 'db', null, null, 'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');
    
    echo '<br>';
    echo '<br>';
    $tblContent = "id INT AUTO_INCREMENT,
    type VARCHAR(255) CHECK (type in ('FIRE', 'WATER', 'ELECTRIC', 'GRASS', 'ICE', 'FIGHTING', 'POISON', 'GROUND', 'FLYING', 'PSYCHIC', 'BUG', 'NORMAL', 'ROCK', 'GHOST', 'DRAGON', 'DARK', 'STEEL', 'FAIRY', 'NULL')),
    img VARCHAR(255),
    PRIMARY KEY (id)";
    check(false, 'tbl', 'type', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    echo '<br>';
    echo '<br>';
    $tblContent = "id INT AUTO_INCREMENT,
    species VARCHAR(255) UNIQUE NOT NULL,
    type1_id INT NOT NULL,
    type2_id INT NOT NULL CHECK (type2_id != type1_id),
    PRIMARY KEY (id),
    FOREIGN KEY (type1_id) REFERENCES type (id),
    FOREIGN KEY (type2_id) REFERENCES type (id)";
    check(false, 'tbl', 'species', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    echo '<br>';
    echo '<br>';
    $tblContent = "id INT AUTO_INCREMENT,
    img VARCHAR(255),
    name VARCHAR(255) NOT NULL,
    species_id INT,
    description  LONGTEXT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (species_id) REFERENCES species (id)";
    check(false, 'tbl', 'pokemon', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    echo '<br>';
    echo '<br>';
    $tblContent = "
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
    check(false, 'col', 'type', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    echo '<br>';
    echo '<br>';
    $tblContent = "
    ('Chandelure', '14', '1'),
    ('Gengar', '14', '7'),
    ('Magnezone', '3', '17'),
    ('Dragonite', '15', '9'),
    ('Lugia', '10', '9'),
    ('Incineroar', '1', '16')";
    check(false, 'col', 'species', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    echo '<br>';
    echo '<br>';
    $tblContent = "
    ('../week8/assets/img/pokemon/chandelure.jpg', 'Amier', '1', 'A gentle and emotional pokémon that enjoys floating about in broad daylight anywhere there are flowers.'),
    ('../week8/assets/img/pokemon/gengar.jpg', 'Leiroh', '2', 'A creative and shy pokémon that really enjoys some peace and quiet. When disturbed from his artist zone, he will throw a temper tantrum.'),
    ('../week8/assets/img/pokemon/magnezone.jpg', 'Paliz', '3', 'A cheeky and mischievous pokémon that enjoys shorting out devices but is easily distracted by her favourite food, macaron.'),
    ('../week8/assets/img/pokemon/dragonite.jpg', 'Dergz', '4', 'He will hug everything and show his unending affection and love to anything and everything. He does not easily forgive anyone who hurts him or the people and pokémon he cares about. He will not hesitate to protect whatever the cost might be.'),
    ('../week8/assets/img/pokemon/lugia.jpg', 'Teraille', '5', 'A Lugia with dwarfism and is very proud of it. He flies about quickly and freely, enjoying how more agile he is due to being smaller and how he can go to places where normal Lugias can’t usually go.'),
    ('../week8/assets/img/pokemon/incineroar.jpg', 'Ohnerion', '6', 'A fiesty and stubborn pokémon, it will take a lot before he start to trust another. But once earning his trust, you might be smothering by tons of affectionate play that might end up with you being scorched or pumelled around with love.')";
    check(false, 'col', 'pokemon', $tblContent,'localhost', 'ashie', 'ThisIsMyPokedoptYIPPIE!!!<3', 'pokedopt');

    //     // $sql = "CREATE USER IF NOT EXISTS '$user'@'$host' IDENTIFIED BY '$password'";

    //     // Check Database Connection
    //     if (!$conn) {

    //         die('Connection Failed: ' . $conn->connect_error);

    //     } else {
            
    //         $query = "SELECT Host, User, Password FROM $db_name.user WHERE Host = '$host' AND User = '$user' AND Password='$password'";
                    
    //         if (!mysqli_query($conn, $sql)) {
    //             die('Query Error: ' . mysqli_error($conn));
    //         } 

    //         // Close Connection
    //         mysqli_close($conn);

    //     }
    //     // Check Database Connection

    // }
    // // Create in DAtabase

    //         $sql = "SELECT Host, User, Password FROM $db_name.user WHERE Host = '$host' AND User = '$user' AND Password='$hashed_password'";

    //         if (!mysqli_query($conn, $sql)) {
    //             die('Query Error: ' . mysqli_error($conn));
    //         } else {
    //             $result = mysqli_query($conn, $sql);

    //             $fetched = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //             mysqli_free_result($result);

    //             if (empty($fetched)) {
    //                 print_r($fetched);
    //             }
    //         }

    //         mysqli_close($conn);

    //     }
    //     // Check Database Connection

    //     function createUser() {

    //         global
    //     }

    // }
    // Create User

    //     function createUser() {

    //         global $host;
    //         global $user;
    //         global $db_name;
    //         global $conn;
    //         global $hashed_password;

    //         // Drop User
    //         $sql = "DROP USER IF EXISTS '$user'@'$host'";

    //         // SQL Check
    //         if (!mysqli_query($conn, $sql)) {

    //             die('Query error: ' . mysqli_error($conn));

    //         }

    //         // Create User
    //         $sql = "CREATE USER IF NOT EXISTS '$user'@'$host' IDENTIFIED BY '$hashed_password'";

    //         // SQL Check
    //         if (!mysqli_query($conn, $sql)) {

    //             die('Query error: ' . mysqli_error($conn));

    //         }

    //     }

    // }

    // // Grant Priviledges
    // {

        // // Connect to Database
        // $conn = mysqli_connect($host, $user , $hashed_password, $db_name);
    
        // // Check Connection
        // if (!$conn) {

        //     die('Connection failed: ' . $conn->connect_error);

        // } else {

        //     // Check if User Exists
        //     $sql = "SHOW GRANTS FOR '$user'@'$host'";

        //     // SQL Check
        //     if (!mysqli_query($conn, $sql)) {

        //         die('Query error: ' . mysqli_error($conn));

        //     } else {

        //         // Make Query & Get Result
        //         $result = mysqli_query($conn, $sql);
    
        //         // Fetch the Resulting Rows as an Array
        //         $privilege = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
        //         // Free results From Memory
        //         mysqli_free_result($result);

        //         // User Function
        //         if (empty($privilege)) {
        //             // createUser();
        //             print_r($privilege);
        //         }
        //     }

        //     // Close Connection
        //     mysqli_close($conn);
        
        // }
        
            
//             DROP USER IF EXISTS 'ashie'@'localhost';
// CREATE USER IF NOT EXISTS 'ashie'@'localhost' IDENTIFIED BY 'ThisIsMyPokedoptYIPPIE!!!<3';
// -- SELECT Host, User, Password FROM mysql.user WHERE Host = 'localhost' AND User = 'ashie' AND Password=PASSWORD('ThisIsMyPokedoptYIPPIE!!!<3');
// -- SELECT Password FROM mysql.user WHERE Host = 'localhost' AND User = 'ashie' AND Password=PASSWORD('ThisIsMyPokedoptYIPPIE!!!<3');

// SELECT PASSWORD('ThisIsMyPokedoptYIPPIE!!!<3');
// SELECT  Password FROM mysql.user WHERE Host = 'localhost' AND User = 'ashie' AND Password=PASSWORD('ThisIsMyPokedoptYIPPIE!!!<3');
    // }

?>