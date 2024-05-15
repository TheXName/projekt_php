<?php

global $pdo;
require_once "pdo.php";
require_once "Validator.php";

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

if ($validator->Validate()) {
    $data = $validator->getResult();
} else {
    print_r ($validator->getErrors());
    exit();
}

$password_confirm = $_POST['password_confirm'];

if ($data['password'] != $password_confirm) {
    echo "Passwords do not match";
    header("location: ../registration.php");
    exit();
}

$sql = "INSERT INTO `users` (`first_name`, `last_name`, `login`, `email`, `password`) 
VALUES (:first_name, :last_name, :login, :email, :password)";

$statement = $pdo->prepare($sql);
$statement->execute($data);

header("location: ../index.php");