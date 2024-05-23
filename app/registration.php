<?php

session_start();
$pdo = require "pdo.php";
require_once "Validator.php";
require_once "models/User.php";
require_once "repositories/UserRepository.php";

$rules = [
        'login' => [
            'type' => 'text',
            'required' => true,
            'min' => 5,
            'max' => 20,
        ],

        'password' => [
            'type' => 'text',
            'required' => true,
            'min' => 5,
            'max' => 20,
        ],

        'first_name' => [
            'type' => 'text',
            'required' => true,
            'min' => 1,
            'max' => 20,
        ],

        'last_name' => [
            'type' => 'text',
            'required' => true,
            'min' => 1,
            'max' => 25,
        ],

        'email' => [
            'type' => 'email',
            'required' => true,
            'min' => 5,
            'max' => 20,
        ]
];

$validator = new Validator($rules);

$password_confirm = $_POST['password_confirm'];

if ($_POST['password'] != $password_confirm) {
    $_SESSION['password_confirm'] = "Passwords do not match";
}

if ($validator->Validate()) {
    $data = $validator->getResult();
} else {
    header("location: ../registration.php");
    exit();
}

if ($data['password'] != $password_confirm) {
    header("location: ../registration.php");
    exit();
}

$user = User::create($data);
$userRepository = new UserRepository($pdo);

$userRepository->saveUser($user);

$userRepository->auth($data);

header("location: ../index.php");