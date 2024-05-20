<?php
session_start();
global $pdo;
require_once "pdo.php";
require_once "Validator.php";
require_once "repositories/UserRepository.php";

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

$repository = new UserRepository($pdo);
if ($repository->auth($data)) {
    header("location: ../index.php");
} else {
    header("location: ../login.php");
}