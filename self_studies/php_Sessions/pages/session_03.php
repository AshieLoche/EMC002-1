<?php

    use Pokédopt\Sessions\MysqlSessionHandler;

    require_once '../config/db_connect.php';
    require_once '../Pokédopt/Sessions/MysqlSessionHandler.php';

    $handler = new MysqlSessionHandler($db);

    session_set_save_handler($handler);

    session_start();

    if (isset($_POST['logout'])) {

        $_SESSION = [];

        $params = session_get_cookie_params();

        setcookie(session_name(), '', time() - 86400, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

        session_destroy();

        header('Location: session_01.php');

        exit;

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
        Hello <?php 
            if (isset($_SESSION['fname'])) {
                echo 'again, ' . $_SESSION['fname'];
            } else {
                echo 'again, Guest';
            }
        ?>
    </p>
     
    <p><a href="session_02.php">Go to page 1</a></p>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

        <p><input type="submit" name="logout" value="Log Out"></p>

    </form>

</body>
</html>