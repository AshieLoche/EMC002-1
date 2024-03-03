<?php

    require_once '../config/authenticate.php';

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

    <p>Hi, <?php echo htmlentities($_SESSION['username']); ?></p>

    <p><a href="restricted2.php">Go to page 2</a></p>

</body>
</html>