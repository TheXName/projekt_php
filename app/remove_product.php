<?php

require_once "repositories/ProductRepository.php";
$pdo = require "pdo.php";

$productRepository = new ProductRepository($pdo);
$productRepository->removeProductById($_GET["id"]);

header("Location: ../admin/products.php");