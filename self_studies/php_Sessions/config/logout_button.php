<form action="logout.php" method="POST">

    <input type="submit" name="logout" value="Log Out">
    <?php $_SESSION['return_to'] = $_SERVER['PHP_SELF']; ?>

</form>