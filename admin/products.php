<?php
session_start();
require_once "../app/models/User.php";
require_once "../app/repositories/UserRepository.php";
require_once "../app/repositories/ProductRepository.php";
$pdo = require "../app/pdo.php";

$user = User::currentUser();

if ($user) {
    if (!$user->isAdmin()) {
        header("Location: cabinet.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

$repository = new ProductRepository($pdo);
$products = $repository->getAllProducts();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .bi {
            fill: white;
        }
    </style>
    <title>products</title>
</head>
<body>
<?php
include "admin_menu.php";
?>
<div class="container">
    <a type="button" class="btn btn-primary" href="create_product.php">Add produkt</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Admin_id</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($products as $product) { ?>
        <tr>
            <th><?= $product['id'] ?></th>
            <td><?= $product['name'] ?></td>
            <td><?= $product['description'] ?></td>
            <td><?= $product['admin_id'] ?></td>
            <td>
                <a type="button" class="btn btn-danger" href="../app/remove_product.php?id=<?= $product['id'] ?>">Remove</a>
                <a type="button" class="btn btn-success" href="edit_product.php?id=<?= $product['id'] ?>">Edit</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>

    </table>
</div>
</body>
</html>