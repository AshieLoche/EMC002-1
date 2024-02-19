<?php

    // Ternary Operators
    $score = 50;

    // if ($score > 40) {
    //     echo 'HIGH SCORE!';
    // } else {
    //     echo 'Low Score!';
    // }

    // $val = $score > 40 ? 'HIGH SCORE!' : 'Low Score';
    // echo $val;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial</title>
</head>
<body>
    <p><?php echo $score > 40 ? 'HIGH SCORE!' : 'Low Score' ?></p>
</body>
</html>