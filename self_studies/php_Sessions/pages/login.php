<?php

    require_once '../config/init.php';

    use Pokédopt\Sessions\AutoLogin;

    if (isset($_POST['login'])) {

        $username = trim($_POST['username']);
        $pwd = trim($_POST['pwd']);
        $stmt = $db->prepare("SELECT pwd FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $stored = $stmt->fetchColumn();

        if (password_verify($pwd, $stored)) {

            session_regenerate_id(true);
            $_SESSION['username'] = $username;
            $_SESSION['authenticated'] = true;

            if (isset($_POST['remember'])) {

                $autologin = new AutoLogin($db);
                $autologin->persistentLogin();

            }

            header('Location: restricted1.php');
            exit;

        } else {

            $error = 'Login Failed: Check username and password.';

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Login</title>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
</head>
<body>

    <h1>Persistent Login</h1>

    <?php

        if (isset($error)) {
            echo "<p>$error</p>";
        }

    ?>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </p>

        <p>
            <label for="pwd">Password:</label>
            <input type="password" name="pwd" id="pwd">
        </p>

        <p>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
        </p>

        <p>
            <input type="submit" name="login" id="login" value="Log In">
        </p>

    </form>

</body>
</html>