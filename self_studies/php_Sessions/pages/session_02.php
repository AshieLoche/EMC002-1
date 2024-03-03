<?php

    use Pokédopt\Sessions\MysqlSessionHandler;

    require_once '../config/db_connect.php';
    require_once '../Pokédopt/Sessions/MysqlSessionHandler.php';

    $handler = new MysqlSessionHandler($db);

    session_set_save_handler($handler);

    session_start();


    if (isset($_POST['fname'])) {

        if (!empty($_POST['fname'])) {

            $_SESSION['fname'] = htmlentities($_POST['fname']);

        } else {

            $_SESSION['fname'] = 'Amir';

        }

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Test</title>
</head>
<body>
    <p>
        Hello, <?php

            if (isset($_SESSION['fname'])) {

                echo $_SESSION['fname'];

            } else {

                echo 'Guest';
                
            }

        ?>
    </p>
    <p><a href="session_03.php">Go to page 2</a></p>
</body>
</html>