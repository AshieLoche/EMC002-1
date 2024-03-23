<?php
    
    if(isset($_POST['pokelist'])) {
        session_start();
        session_unset();
        session_destroy();
        setcookie("userID", '', time()-3600, "/", "");
        
        header('Refresh: 0; URL=../pages/pokedopt.php');
        exit;
    }

?>