<?php

    // Classes

    class User {

        private $email;
        private $name;

        public function __construct($name, $email) {
            // $this->email = 'mario@mgail.com';
            // $this->name = 'Mario';
            $this->email = $email;
            $this->name = $name;
        }

        public function login() {
            // echo 'The user logged in.';
            echo "$this->name logged in.";
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            if (is_string($name) && strlen($name) > 2) {
                $this->name = $name;
                return 'Name successfully updated.';
            } else {
                return 'Not a valid name.';
            }
        }

    }

    // $userOne = new User();

    // $userOne->login();
    // echo '<br>' . $userOne->email;
     
    $userTwo = new User('Yoshi', 'yoshi@gmail.com');

    // echo $userTwo->name . '<br>';
    // echo $userTwo->email . '<br>';
    // $userTwo->login();

    echo $userTwo->getName(). '<br>';
    echo $userTwo->setName('Luigi'). '<br>';
    echo $userTwo->getName(). '<br>';

?>