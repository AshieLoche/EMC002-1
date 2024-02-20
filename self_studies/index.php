<?php

    $folderpath = 'php_OOP';
    $indexfile = 'index.php';
    $filepath = "$folderpath\\$indexfile";

    if (!is_dir($folderpath)) {
        mkdir($folderpath);
        echo 'Directory Created';
    } else {
        $handle_indexfile = fopen($filepath, 'a');
        echo 'Index File Created';
        header("Location:$filepath");
    }
     
?>