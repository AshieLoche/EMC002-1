<?php

    // String
    $stringOne = 'my email is ';
    $stringTwo = 'mario123@gmail.com';
    // echo $stringOne . $stringTwo;

    $name = 'Mario';
    // String Interpolation
    // echo 'Hey my name is ' . $name;
    // echo "Hey my name is $name";

    // Escape Characters
    // echo "The ninja screamed \"WAAAHHHHHHHH!\"";
    // echo 'The ninja screamed "SCREEEEEEEEEEEEEEEE!"';

    // String List
    // echo $name[1];

    // String Functions
    // echo strlen($name);
    // echo strtoupper($name);
    // echo strtolower($name);
    // echo str_replace('M', 'W', $name);
    // ------------------------------------------------------------

    // Numbers
    $radius = 25;
    $pi = 3.14;

    // Operators: +, -, *, /, **
    // echo $radius * $pi**2;

    // Order of Operations: (B I D M A S)
    // echo 2 * (4 + 3) / 3;

    // Increment & Decrement Operators
    // echo $radius++;
    // echo $radius;

    // Shorthand Operators
    $age = 20;
    // $age **= 2;
    // echo $age;

    // Number Functions
    // echo floor($pi);
    // echo ceil($pi);
    // echo pi();
    // ------------------------------------------------------------

    // Arrays
    // Index Arrays
    $peopleOne = ['shaun', 'crystal', 'ryu'];
    // echo $peopleOne[2];

    $peopleTwo = array('ken', 'chun-li');
    // echo $peopleTwo[1];

    $ages = [20, 30, 40 , 50];
    // print_r($ages);

    $ages[1] = 25;
    // print_r($ages);

    $ages[] = 60;
    // print_r($ages);

    array_push($ages, 70);
    // print_r($ages);

    // echo count($ages);

    $peopleThree = array_merge($peopleOne, $peopleTwo);
    // print_r($peopleThree);

    // Associative Arrays
    $ninjasOne = ['shaun' => 'black', 'mario' => 'orange', 'luigi' => 'brown'];
    // echo $ninjasOne['mario'];
    // print_r($ninjasOne);

    $ninjasTwo = array('bowser' => 'green', 'peach' => 'yellow');
    // print_r($ninjasTwo);

    $ninjasTwo['toad'] = 'pink';
    // print_r($ninjasTwo);

    $ninjasTwo['peach'] = 'violet';
    // print_r($ninjasTwo);

    // echo count($ninjasOne);

    $ninjasThree = array_merge($ninjasOne, $ninjasTwo);
    // print_r($ninjasThree);
    // ------------------------------------------------------------

    // Multi-Dimensional Arrays
    $blogs = [
        'blog1' => ['title' => 'mario party', 'author' => 'mario', 'content' => 'lorem', 'likes' => 30],
        ['title' => 'mario kart cheats', 'author' => 'toad', 'content' => 'lorem', 'likes' => 25],
        ['title' => 'zelda hidden chests', 'author' => 'link', 'content' => 'lorem', 'likes' => 50]
    ];

    // print_r($blogs);
    // print_r($blogs[1]);
    // echo $blogs['blog1']['title'];
    // echo count($blogs);

    $blogs[] = ['title' => 'castle party', 'author' => 'peach', 'content' => 'lorem', 'likes' => 100];
    // print_r($blogs);

    $popped = array_pop($blogs);
    // print_r($popped);
    // print_r($blogs);
    // ------------------------------------------------------------

    // Loops
    $ninjas = ['shaun', 'ryu', 'yoshi'];

    // for ($i = 0; $i < count($ninjas); $i++) {
    //     echo "$ninjas[$i]<br>";
    // }

    // foreach ($ninjas as $ninja) {
    //     echo "$ninja<br>";
    // }

    $products = [
        ['name' => 'shiny star', 'price' => 20],
        ['name' => 'green sheel', 'price' => 10],
        ['name' => 'red shell', 'price' => 15],
        ['name' => 'gold coin', 'price' => 5],
        ['name' => 'lightning bolt', 'price' => 40],
        ['name' => 'banana skin', 'price' => 2]
    ];

    // foreach ($products as $product) {
    //     echo $product['name'] . " - " . $product['price'] . '<br>';
    // }

    $i = 0;

    // while ($i < count($products)) {
    //     echo $products[$i]['name'] . '<br>';
    //     $i++;
    // }
    // ------------------------------------------------------------

    // Booleans & Comparisons
    // while ($i < count($products)) {
    //     echo  $products[$i]['name'] . '<br>';
    //     $i++;
    // }

    // echo 5 < 10;
    // echo 5 > 10;
    // echo 5 == 10;
    // echo 10 == 10;
    // echo 5 != 10;
    // echo 5 <= 5;
    // echo 5 >= 5;

    // echo 'shaun' < 'yoshi';
    // echo 'shaun' > "yoshi";
    // echo 'shaun' > 'Shaun';
    // echo 'mario' == 'mario';
    // echo 'mario' == 'Mario';

    // Loose & Strict Comparison
    // echo 5 == '5';
    // echo 5 === '5';

    // echo true == "1";
    // echo false == "";
    // ------------------------------------------------------------

    // Conditional Statements
    $price = 20;

    // if ($price < 10) {
    //     echo 'the condition is met';
    // } else if ($price < 30) {
    //     echo 'elseIf condition met';
    // } else {
    //     echo 'condition not met';
    // }

    // foreach ($products as $product) {
    //     if ($product['price'] < 15 && $product['price'] > 2) {
    //         echo $product['name'] . '<br>';
    //     }
        
    //     if ($product['price'] < 20 || $product['price'] > 10) {
    //         echo $product['name'] . '<br>';
    //     }
    // }
    // ------------------------------------------------------------

    // Continue & Break
    // foreach ($products as $product) {
    //     if ($product['name'] === 'lightning bolt') {
    //         break;
    //     }

    //     if ($product['price'] > 15) {
    //         continue;
    //     }

    //     echo $product['name'] . '<br>';
    // }
    // ------------------------------------------------------------

    // Functions
    // function sayHello($name = 'Shaun',$time = 'morning') {
    //     echo "Good $time $name!";
    // }

    // sayHello('Mario', 'Night');

    // function formatProduct($product) {
    //     echo "{$product['name']} costs $ {$product['price']} to buy <br>";
    //     return "{$product['name']} costs $ {$product['price']} to buy <br>";
    // }

    // $formatted = formatProduct($products[0]);
    // echo $formatted;
    // ------------------------------------------------------------

    // Variable Scope
    // Local Scope
    function myFunc() {
        $priceLocal = 10;
        echo $priceLocal;
    }

    // myFunc();
    // echo $priceLocal:

    function myFunc2($ageLocal) {
        echo $ageLocal;
    }

    // myFunc2(25);
    // echo $ageLocal;

    $nameGlobal = 'Mario';

    // function sayHello() {
    //     global $nameGlobal;
    //     $nameGlobal = 'Yoshi';
    //     echo "Hello $nameGlobal!";
    // }

    // sayHello();
    // echo $nameGlobal;

    // function sayBye(&$nameGlobal) {
    //     $nameGlobal = 'Luigi';
    //     echo "bye $nameGlobal";
    // }

    // sayBye($nameGlobal);
    // echo $nameGlobal;
    // ------------------------------------------------------------

    // Include & Require
    // include('ninjas.php');
    // require('ninjas.php');
    include 'ninjas.php' ;
    require 'ninjas.php' ;
    echo 'end of php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorials</title>
</head>
<body>
    <!-- <h1>Products</h1>
    <ul>
        <?php foreach ($products as $product) { ?>
            <h3><?php echo '<li>' . $product['name'] . '</li>' ?></h3>
            <p>$ <?php echo $product['price'] ?></p>
        <?php } ?>
    </ul> -->

    <!-- <div>
        <ul>
            <?php foreach ($products as $product) { ?>
                <?php if ($product['price'] > 15) { ?>
                    <li><?php echo $product['name']; ?></li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div> -->

    <!-- <?php include 'content.php'; ?>
    <?php include 'content.php'; ?>
    <?php include 'content.php'; ?>  -->
</body>
</html>