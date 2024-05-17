<?php
session_start();
global $pdo;
require_once "pdo.php";
require_once "Validator.php";

$rules = [
    'login' => [
        'type' => 'text',
        'required' => true
    ],

    'password' => [
        'type' => 'text',
        'required' => true
    ]
];

$validator = new Validator($rules);

if ($validator->Validate()) {
    $data = $validator->getResult();
} else {
    header("location: ../login.php");
    exit();
}

$sql = 'SELECT * FROM `users` WHERE login = :login AND password = :password';

$statement = $pdo->prepare($sql);
$statement->execute($data);

$user = $statement->fetch();

if ($user) {
    $_SESSION['user_login'] = $user['login'];
    header("location: ../index.php");
} else {
    $_SESSION["login_error"] = "There is no user with this credentials ";
    header("location: ../login.php");
    exit();
}