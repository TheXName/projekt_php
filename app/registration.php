<?php

global $pdo;
require_once "pdo.php";

print_r($_POST);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password != $password_confirm) {
    echo "Passwords do not match";
    header("location: ../registration.php");
    exit();
}

$pdo->query("INSERT INTO `users` (`first_name`, `last_name`, `login`, `email`, `password`) 
VALUES ('$first_name', '$last_name', '$login', '$email', '$password')");

header("location: ../index.php");