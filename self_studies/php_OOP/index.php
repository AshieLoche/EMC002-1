<?php

    require 'user_validator.php';

    $username = $email = '';

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];

        // validate entries
        $validation = new UserValidator($_POST);
        $errors = $validation->validateForm();

        // save data to db

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP Tutorial</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="new-user">
        <h2>Create new user</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>">
            <div class="error">
                <?php echo $errors['username'] ?? ''; ?>
            </div>
            <br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="error">
            <div class="error">
                <?php echo $errors['email'] ?? ''; ?>
            </div>
            <br>
            <input type="submit" value="Submit" name="submit">
        </form>
    </div>
</body>
</html>