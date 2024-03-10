
(username, email, password, role_id, fname, lname, mobile, bday)

VALUES

(
    'Ashie_Loche',
    
    'ashie.loche@pokedopt.com', 
    
    ':password',

    (SELECT id FROM role WHERE role = 'admin'),

    'Ashie',

    'Loche',

    '639165733654',

    '2002/12/09'
)

<?php

    require '../config/db_connect.php';

    if (isset($_POST['signUp'])) {

        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['mobile']) && isset($_POST['bday'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
            $fname = mysqli_real_escape_string($conn, $_POST['fname']);
            $lname = mysqli_real_escape_string($conn, $_POST['lname']);
            $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
            $bday = mysqli_real_escape_string($conn, $_POST['bday']);
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