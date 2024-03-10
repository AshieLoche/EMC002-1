<?php

    require '../config/db_connect.php';

    if (isset($_POST['signIn'])) {

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
        }
        
        // Select Pokemon Data
        $query = "SELECT * FROM account WHERE email = '$email'";

        // SQL Check
        if (!mysqli_query($conn, $query)) {
            die('Query error: ' . mysqli_error($conn));
        } else {
            // Make Query & Get Result
            $result = mysqli_query($conn, $query);

            // Fetch the Resulting Rows as an Array
            $user = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Free results From Memory
            mysqli_free_result($result);
        }

        // Close Connection
        mysqli_close($conn);

        if (password_verify($password, $user[0]['password'])) {
            session_start();

            $_SESSION['user'] = $user;

            header('Location: ../pages/pokedopt.php');
            exit;
        }

    }

?>