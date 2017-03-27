<?php
session_start();
require __DIR__.'../../model/users.class.php';

$name = $_POST['name'];
$password = $_POST['password'];

$login = new Users();

if($login->login($name, $password))
    header('Location: ../index.php');
else
    header('refresh:2; url=../index.php');



