<?php

    // File System - Part 1

    // $file = 'database.txt';

    // if (file_exists($file)) {
    //     // read file
    //     echo readfile($file) . '<br>' . '<br>';

    //     // copy file
    //     copy($file, 'db.txt');

    //     // absolute path
    //     echo realpath($file) . '<br>' . '<br>';

    //     // file size
    //     echo filesize($file) . '<br>' . '<br>';

    //     // rename file
    //     rename($file, 'database_creation.txt');
    // } else {
    //     echo 'File does not exists.';
    // }

    // mkdir('db');

    // File System - Part 2

    // $file = 'database_creation.txt';

    // opening a file for reading
    // $handle = fopen($file, 'a+');

    // read the file
    // echo fread($handle, filesize($file));
    // echo fread($handle, 112);
    
    // read a single line
    // echo fgets($handle);
    // echo fgets($handle);

    // read a single character
    // echo fgetc($handle);
    // echo fgetc($handle);
    // echo fgetc($handle);
    // echo fgetc($handle);

    // writing to a file
    // fwrite($handle, "\nEverything popular is wrong");

    // fclose($handle);

    // unlink('db.txt');
    // rmdir('db');

    $oldfile = 'sandbox.php';
    $folderpath = 'img/';
    $newfile = 'filesystem.php';
    $filepath = $folderpath . $newfile;

    if (file_exists($oldfile)) {
        $handleoldfile = fopen($oldfile, 'r');
        echo 'OLD FILE OPENED<br>';
    }
    $handlenewfile = fopen($filepath, 'w+');
    echo 'NEW FILE OPENED<br>';

    if ($handlenewfile == true && $handleoldfile == true) {
        $oldfilecontent = fread($handleoldfile, filesize($oldfile));
        echo 'OLD FILE READ<br>';
        fwrite($handlenewfile, $oldfilecontent);
        echo 'NEW FILE WRITE<br>';
        fclose($handlenewfile);
        echo 'NEW FILE CLOSED<br>';
        fclose($handleoldfile);
        echo 'OLD FILE CLOSED<br>';
    }

    $oldFilePath = 'img/filesystem.php';
    $newFilePath = 'old/filesystem.php';

    if (rename($oldFilePath, $newFilePath)) {
        echo 'File moved successfully';
    } else {
        echo 'Error moving file';
    }
     
?>