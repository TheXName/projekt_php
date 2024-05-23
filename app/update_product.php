<?php
require_once "Validator.php";
require_once "repositories/ProductRepository.php";
require_once "models/Product.php";
require_once "models/User.php";
require_once "repositories/UserRepository.php";
$pdo = require "pdo.php";

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
    ],

    'id' => [
        'type' => 'number',
        'required' => true,
        'min' => 1
    ],

    'admin_id' => [
        'type' => 'number',
        'required' => true,
        'min' => 1
    ]
];

$validator = new Validator($rules);

if ($validator->Validate()) {
    $data = $validator->getResult();
} else {
    header("location: ../admin/edit_product.php");
    exit();
}

$product = Product::create($data);

$productRepository = new ProductRepository($pdo);
$productRepository -> updateProduct($product);

header("location: ../admin/products.php");