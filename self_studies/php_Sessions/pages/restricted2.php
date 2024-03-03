<?php

    require_once '../config/authenticate.php';

    if (isset($_POST['choose'])) {
        $_SESSION['color'] = $_POST['color'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restricted Page</title>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
</head>
<body>

    <h1>Restricted Page</h1>

    <?php include '../config/logout_button.php'; ?>

    <p>Still here, <?php echo htmlentities($_SESSION['username']); ?></p>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

        <label for="color">Select a color:</label>
        <select name="color" id="color">
            <option value="">Choose one</option>
            <option <?php
            if (isset($_SESSION['color']) && $_SESSION['color'] == 'Blue') {
                echo 'selected';
            } ?>>Choose one</option>
        </select>

    </form>

    <p><a href="restricted1.php">Go to page 1</a></p>

</body>
</html>