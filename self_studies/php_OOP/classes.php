<?php

    class User {

        // Properties
        protected $username; //Protected Modifier
        protected $email; //Protected Modifier
        public $role = 'member';

        // Constructor
        public function __construct($username, $email) {
            $this->username = $username;
            $this->email = $email;
        }

        // Clone & Destruct (Magic Methods)
        public function __destruct() {
            echo "The user: $this->username was removed.<br>";
        }

        public function __clone() {
            $this->username = "{$this->username} (cloned)<br>";
        }
        // Clone & Destruct (Magic Methods)

        // Methods
        public function addFriend() {
            return "$this->email added a new friend.";
        }

        public function message() {
            return "$this->email sent a new message.";
        }

        public function getUsername() {
            return $this->username;
        }

        public function setUsername($username) {
            if (is_string($username)) {
                $this->username = $username;
                return 'Username successfully updated.';
            } else {
                return 'Invalid username!';
            }
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            if (strpos($email, '@') > 1) {
                $this->email = $email;
                return 'Email successfully updated.';
            } else {
                return 'Invalid email!';
            }
        }

    }

    $userOne = new User('Yoshi', 'yoshi@gmail.com');
    $userTwo = new User('Mario', 'mario@gmail.com');

    // Clone & Destruct (Magic Methods)
    $userOneClone = clone $userOne;
    echo $userOneClone->getUsername();
    // Clone & Destruct (Magic Methods)

    echo get_class($userOne) . '<br>';
    echo get_class($userTwo) . '<br>';
    print_r(get_class_vars('User'));
    echo '<br>';
    print_r(get_class_methods('User'));
    echo '<br>';

    echo "{$userOne->getUsername()}<br>";
    echo "{$userOne->setEmail('yoshi1@gmail.com')}<br>";
    echo "{$userOne->getEmail()}<br>";
    echo "{$userOne->addFriend()}<br>";
    echo "{$userOne->role}<br>";
    echo "{$userOne->message()}<br>";

    echo "{$userTwo->getUsername()}<br>";
    echo "{$userTwo->getEmail()}<br>";
    echo "{$userTwo->addFriend()}<br>";
    unset($userTwo);

    // Inheritance
    class AdminUser extends User {
        public $level;

        // Overriding Properties & Methods
        public $role = 'admin';

        public function __construct($username, $email, $level) {
            $this->level = $level;
            parent::__construct($username, $email);
        }
         
        public function message() {
            return "$this->email, an admin, sent a new message.";
        }
    }

    $adminOne = new AdminUser('Luigi', 'luigi@gmail.com', 5);

    echo "{$adminOne->getUsername()}<br>";
    echo "{$adminOne->getEmail()}<br>";
    echo "{$adminOne->addFriend()}<br>";
    echo "{$adminOne->level}<br>";
    echo "{$adminOne->role}<br>";
    echo "{$adminOne->message()}<br>";

    // Static Properties & Methods
    class Weather {

        private $F, $C;
        public static $tempConditions = ['cold', 'mild', 'warm'];

        public static function celsuisToFahrenheit($C) {
            $F = $C * 9 / 5 + 32;
            return $F;
        }
        
        public static function fahrenheitToCelsuis($F) {
            $C = ($F - 32) * 5 / 9;

            if ($F < 40) {
                echo self::$tempConditions[0] . '<br>';
            } else if ($F < 70) {
                echo self::$tempConditions[1] . '<br>';
            } else {
                echo self::$tempConditions[2] . '<br>';
            }

            return $C;
        }
    }

    print_r(Weather::$tempConditions);
    echo '<br>';
    echo Weather::fahrenheitToCelsuis(10) . '<br>';
    echo Weather::celsuisToFahrenheit(100) . '<br>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP Tutorial</title>
</head>
<body>
</body>
</html>