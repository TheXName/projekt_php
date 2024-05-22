<?php
require_once "Validator.php";
require_once "repositories/ProductRepository.php";
require_once "models/Product.php";
require_once "models/User.php";
require_once "repositories/UserRepository.php";
global $pdo;
require_once "pdo.php";

$rules = [
    'name' => [
        'type' => 'text',
        'required' => true,
        'min' => 1,
        'max' => 20
    ],

    'description' => [
        'type' => 'text',
        'required' => true,
        'min' => 1,
        'max' => 1000
    ]
];

$validator = new Validator($rules);

if ($validator->Validate()) {
    $data = $validator->getResult();
} else {
    header("location: ../admin/create_product.php");
    exit();
}

$user = User::currentUser();
$data['admin_id'] = $user->getId();

$product = Product::create($data);

var_dump($product);

$productRepository = new ProductRepository($pdo);
$productRepository -> saveProduct($product);

header("location: ../admin/products.php");

