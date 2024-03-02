<?php

    $errors = [];

    if (isset($_POST['register'])) {

        require_once '../config/db_connect.php';

        $expected = ['username', 'pwd', 'confirm'];

        foreach ($_POST as $key => $value) {

            $$key = trim($value);

            if (empty($$key)) {

                $errors[$key] = 'This field requires a value';

            }

        }

        if (!$errors) {

            if ($pwd != $confirm) {

                $errors['nomatch'] = 'Passwords do not match';

            } else {

                $sql = "SELECT COUNT(*) FROM users WHERE username = :username";

                $stmt = $db->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->execute();

                if ($stmt->fetchColumn() !=0) {

                    $errors['failed'] = "$username is already registered. Choose another name.";

                } else {

                    try {

                        $user_key = hash('crc32', microtime(true) . mt_rand() . $username);
    
                        $sql = "INSERT INTO users (user_key, username, pwd)
                        VALUES (:key, :username, :pwd)";
    
                        $stmt = $db->prepare($sql);
                        $stmt->bindParam(':key', $user_key);
                        $stmt->bindParam(':username', $username);
                        $stmt->bindValue(':pwd', password_hash($pwd, PASSWORD_DEFAULT));
                        $stmt->execute();

                    } catch (\PDOException $e) {

                        if (0 === strpos($e->getCode(), '23')) {

                            $user_key = hash('crc32', microtime(true) . mt_rand() . $username);

                            if (!$stmt->execute) {
                                throw $e;
                            }

                        }

                    }

                    if ($stmt->rowCount()) {

                        header('Location: login.php');
                        exit;

                    }

                }

            }

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
</head>
<body>

    <h1>Create Account</h1>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo (isset($username) && !isset($errors['username'])) ? htmlentities($username) : ''; ?>">

            <?php
                if (isset($errors['username'])) {
                    echo $errors['username'];
                } else if (isset($errors['failed'])) {
                    echo $errors['failed'];
                }
            ?>
        </p>

        <p>
            <label for="pwd">Password:</label>
            <input type="password" name="pwd" id="pwd">

            <?php
                if (isset($errors['pwd'])) {
                    echo $errors['pwd'];
                }
            ?>
        </p>
        
        <p>
            <label for="confirm">Password:</label>
            <input type="password" name="confirm" id="confirm">

            <?php
                if (isset($errors['confirm'])) {
                    echo $errors['confirm'];
                } else if (isset($errors['nomatch'])) {
                    echo $errors['nomatch'];
                }
            ?>
        </p>

        <p>
            <input type="submit" name="register" id="register" value="Create Account">
        </p>

    </form>

</body>
</html>