<?php

    require_once __DIR__ . '/init.php';

    use Pokédopt\Sessions\AutoLogin;

    if (isset($_SESSION['authenticated']) || isset($_SESSION['pokédopt_auth'])) {

    } else {

        $autologin = new AutoLogin($db);
        $autologin->checkCredentials();

        if (!isset($_SESSION['pokédopt_auth'])) {

            header('Location: login.php');
            exit;

        }

    }


?>