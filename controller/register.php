<?php
require __DIR__.'../../model/users.class.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$register = new Users();

if(!$register->isUserExists($name, $email)){
    $register->register($name, $email, $password);
    echo "Registration succesful";
    header('refresh:2; url=../index.php');

} else{
    echo "User or email already exists";
    // header('refresh:2; url=../index.php');
}

