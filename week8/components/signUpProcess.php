<?php

    require '../config/db_connect.php';

    $errorMessage = '';
    $errors = array(
        'username' => '',
        'email' => '',
        'mobile' => ''
    );

    if (isset($_POST['signUp'])) {

        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['confirm_password']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['mobile']) && isset($_POST['bday'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
            $fname = mysqli_real_escape_string($conn, $_POST['fname']);
            $lname = mysqli_real_escape_string($conn, $_POST['lname']);
            $mobile = '63' . mysqli_real_escape_string($conn, $_POST['mobile']);
            $bday = mysqli_real_escape_string($conn, $_POST['bday']);
        }
        
        // Select Pokemon Data
        $username_query = "SELECT username FROM account WHERE username = '$username'";

        $email_query = "SELECT email FROM account WHERE email = '$email'";

        $mobile_query = "SELECT mobile FROM account WHERE mobile = '$mobile'";

        // SQL Check
        if (!mysqli_query($conn, $username_query)) {
            die('Query error: ' . mysqli_error($conn));
        } else {
            // Make Query & Get Result
            $result = mysqli_query($conn, $username_query);

            // Fetch the Resulting Rows as an Array
            $user_username = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Free results From Memory
            mysqli_free_result($result);
        }

        // SQL Check
        if (!mysqli_query($conn, $email_query)) {
            die('Query error: ' . mysqli_error($conn));
        } else {
            // Make Query & Get Result
            $result = mysqli_query($conn, $email_query);

            // Fetch the Resulting Rows as an Array
            $user_email = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Free results From Memory
            mysqli_free_result($result);
        }

        // SQL Check
        if (!mysqli_query($conn, $mobile_query)) {
            die('Query error: ' . mysqli_error($conn));
        } else {
            // Make Query & Get Result
            $result = mysqli_query($conn, $mobile_query);

            // Fetch the Resulting Rows as an Array
            $user_mobile = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Free results From Memory
            mysqli_free_result($result);
        }

        if (!empty($user_username[0]['username'])) {
            $errors['username'] = 'Username already exists\n';
        }
        
        if (!empty($user_email[0]['email'])) {
            $errors['email'] = 'Email already in use\n';
        }

        if (!empty($user_mobile[0]['mobile'])) {
            $errors['mobile'] = 'Mobile number already in use\n';
        }

        if (array_filter($errors)) {

            foreach (array_filter($errors) as $error) {
                $errorMessage .= $error;
            }

            if (isset($_SESSION['userID'])) {
                session_unset();
                session_destroy();
            }
    
            echo "<script>alert('$errorMessage');</script>";
            header('Refresh: 0; URL=../pages/guest.php');
            exit;

        } else {

            $insert_query = "INSERT INTO account (username, email, password, role_id, fname, lname, mobile, bday)
            VALUES ('$username', '$email', ':password', (SELECT id FROM role WHERE role = 'user'), '$fname', '$lname', '$mobile', ':bday')";

            $insert_query = str_replace(':password', password_hash('ThisIsMyPokedoptYIPPIE!!!<3', PASSWORD_DEFAULT), $insert_query);
            
            $insert_query = str_replace(':bday', date('Y-m-d', strtotime($bday)), $insert_query);

            if (!mysqli_query($conn, $insert_query)) {
                die('Query error: ' . mysqli_error($conn));
            } else {
                
                $query = "SELECT * FROM account WHERE email = '$email'";

                if (!mysqli_query($conn, $query)) {
                    die('Query error: ' . mysqli_error($conn));
                } else {

                    // Make Query & Get Result
                    $result = mysqli_query($conn, $query);
        
                    // Fetch the Resulting Rows as an Array
                    $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
                    // Free results From Memory
                    mysqli_free_result($result);
    
                    // Close Connection
                    mysqli_close($conn);
    
                    session_start();
        
                    $_SESSION['userID'] = $user['0']['id'];
    
                    header('Refresh: 0; URL=../pages/pokedopt.php');
                    exit;
                }

            }

        }

    }

?>