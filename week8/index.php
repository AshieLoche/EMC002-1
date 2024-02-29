<?php
    
//     header('Location: pages/pokedopt.php');

// session_start();

// if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
//     header('Location: guest.php');
//     exit;
// }

// // If the user is logged in, redirect them to the 'pokedopt.php' page
// header('Location: pokedopt.php');
// exit;

// session_start();


// require "Util.php";
// $util = new Util();

// if(isset($_POST["submit"])) {
//     $username = $util->test_input($_POST["member_name"]);
//     $password = $util->test_input($_POST["password"]);

//     if(!empty($username) && !empty($password)) {
//         $auth = new Auth();
//         $result = $auth->authenticate($username, $password);

//         if($result) {
//             if(isset($_POST["remember"])) {
//                 setcookie("member_login", $username, time() + (3600 * 24 * 14));
//                 setcookie("password", $password, time() + (3600 * 24 * 14));
//             } else {
//                 setcookie("member_login", "", time() - 3600);
//                 setcookie("password", "", time() - 3600);
//             }
//             $_SESSION["member_id"] = $result;
//             $util->redirect("dashboard.php");
//         } else {
//             $message = "Invalid Login";
//         }
//     } else {
//         $message = "Please fill out all fields.";
//     }
// }

session_start();

    $user = [];
    $username = '';
    $email = '';
    $password = '';

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = [$username, $email, $password];

        $_SESSION[$username] = $user;

        // setcookie($username,  $user, time() + 86400);

    }
    
    if (isset($_SESSION[$username])) {
        echo "Session: ";
        print_r($_SESSION[$username]);
        echo "<br>";
    }

    // if (isset($_COOKIE[$username])) {
    //     echo "Cookies: ";
    //     print_r($_COOKIE[$username]);
    //     echo "<br>";
    // }

?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="username">Username: </label>
    <input type="username" name="username" value="<?php echo htmlspecialchars($username) ?? '' ?>" id="email">
    <br>
    <label for="email">Email: </label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($email) ?? '' ?>" id="email">
    <br>
    <label for="password">Password: </label>
    <input type="password" name="password" value="<?php echo htmlspecialchars($password) ?? '' ?>" id="password">
    <br>
    <input type="submit" name="submit" value="Submit">
</form>

<!-- <form action="" method="post" id="frmLogin">
    <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
    <div class="field-group">
        <div>
            <label for="login">Username</label>
        </div>
        <div>
            <input name="member_name" type="text"
                value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>"
                class="input-field">
        </div>
    </div>
    <div class="field-group">
        <div>
            <label for="password">Password</label>
        </div>
        <div>
            <input name="password" type="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" class="input-field">
        </div>
    </div>
    <div class="field-group">
        <div>
            <label for="remember">Remember Me</label>
        </div>
        <div>
            <input type="checkbox" name="remember"
                <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> >
        </div>
    </div>
    <div class="field-group">
        <div>
            <input type="submit" value="Login" name="submit" class="button">
        </div>
    </div>
</form> -->