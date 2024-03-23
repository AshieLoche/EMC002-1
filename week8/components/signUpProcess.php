<?php

    require '../config/db_connect.php';

    $errorMessage = '';
    $errors = array(
        'username' => '',
        'email' => '',
        'mobile' => ''
    );

    if (isset($_POST['signUp'])) {

        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['confirm_password']) && isset($_POST['mobile']) && isset($_POST['bday'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
            // $pfp = mysqli_real_escape_string($conn, $_POST['pfp']);
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

            $insert_query = "INSERT INTO account (role_id, email, password, username, mobile, bday)
            VALUES ((SELECT id FROM role WHERE role = 'user'), '$email', ':password', '$username', '$mobile', ':bday')";

            $insert_query = str_replace(':password', password_hash($confirm_password, PASSWORD_DEFAULT), $insert_query);
            
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
        
                    if(isset($_POST['remember'])) {
                        setcookie("userID", $user['0']['id'], time()+30*24*60*60, "/", "");
                    } else {
                        $_SESSION['userID'] = $user['0']['id'];
        
                    }
    
                    header('Refresh: 0; URL=../pages/pokedopt.php');
                    exit;
                }

            }

        }

    }

?>