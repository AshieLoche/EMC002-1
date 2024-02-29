<?php

    // Get session cookie parameters
    $params = session_get_cookie_params();

    // Set session cookie to only be sent over HTTPS and only be accessible via the HTTP protocol
    $params['secure'] = true;
    $params['httponly'] = true;

    // Set the session cookie parameters
    session_set_cookie_params($params);

    // Start the session
    session_start();

    if (!isset($_SESSION['auth_token'])) {
        // Generate a unique token for the user
        $token = bin2hex(random_bytes(32));
    
        // Save the token in the session
        $_SESSION['auth_token'] = $token;
    
        // Set the token as a cookie
        setcookie('auth_token', $token, time() + 60 * 60 * 24 * 30, '/');
    }

    $username = '';
    $email = '';
    $password = '';
    $key = generate_key();

    function generate_key($length = 32) {
        return bin2hex(random_bytes($length / 2));
    }
    
    // Set the auth_token to the session value by default
    $auth_token = $_SESSION['auth_token'];

    // Check if the user has submitted the login form
    if (isset($_POST['remember'])) {
        // Get the auth_token from the POST request
        if (isset($_POST['auth_token'])) {
            $auth_token = $_POST['auth_token'];
        }

        // Check if the auth_token matches the one in the session
        if ($auth_token == $_SESSION['auth_token']) {
            echo '<p>Login credentials saved.</p>';
            // Authenticate the user
            $username = test_input($_POST['username'], 'username');
            $email = test_input($_POST['email'], 'email');
            $password = test_input($_POST['password'], 'password');
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);;

            // Save the username, email, and password in the session
            $_SESSION['username'] = encrypt($username);
            $_SESSION['email'] = encrypt($email);
            $_SESSION['password'] = encrypt($hashed_password);

            // Save the username, email, and password in cookies (optional)
            setcookie('username', decrypt($_SESSION['username']), time() + 86400);
            setcookie('email', decrypt($_SESSION['email']), time() + 86400);
            setcookie('password', decrypt($_SESSION['password']), time() + 86400);

            // Regenerate the auth_token to prevent session fixation attacks
            $_SESSION['auth_token'] = bin2hex(random_bytes(32));
            setcookie('auth_token', $_SESSION['auth_token'], time() + 60 * 60 * 24 * 30, '/');
            
        }

    }

    function test_input($data, $type) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    
        return $data;

    }

    function encrypt($data) {
        global $key;

        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);

        return base64_encode($iv . $encrypted);
    }
    
    function decrypt($data) {
        global $key;

        $data = base64_decode($data);

        $iv = mb_substr($data, 0, 16, '8bit');

        $encrypted_data = mb_substr($data, 16, null, '8bit');

        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
    }
    
    if (isset($_SESSION['username']) && isset($_SESSION['email']) && isset($_SESSION['password'])) {
        
        echo 'Session[username] Encrypted: '.$_SESSION['username'].'<br><br>';
        echo 'Session[email] Encrypted: '.$_SESSION['email'].'<br><br>';
        echo 'Session[password] Encrypted: '.$_SESSION['password'].'<br><br>';

    }
    
    if (isset($_COOKIE['username']) && isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
        
        echo 'Cookie[username] Encrypted: '.$_COOKIE['username'].'<br><br>';
        echo 'Cookie[email] Encrypted: '.$_COOKIE['email'].'<br><br>';
        echo 'Cookie[password] Encrypted: '.$_COOKIE['password'].'<br><br>';

    }

    if(isset($_SESSION['auto_login']) && isset($_COOKIE['auto_login'])) {
        header('Location: pages/pokedopt.php');
    } else {
        header('Location: pages/guest.php');
    }
    
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>">
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($password); ?>">
    <br>
    <input type="hidden" name="auth_token" value="<?php echo htmlspecialchars($_SESSION['auth_token']); ?>">
    <input type="checkbox" name="remember" id="remember">
    <label for="remember">Remember me</label>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>