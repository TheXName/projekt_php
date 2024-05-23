<?php
require_once "../app/repositories/ProductRepository.php";
require_once "../app/repositories/UserRepository.php";
$pdo = require "../app/pdo.php";

$productRepository = new ProductRepository($pdo);
$userRepository = new UserRepository($pdo);
$product = $productRepository->getProductById($_GET["id"]);
$admins = $userRepository->getAdmins();
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
    <form action="/projekt_php/app/update_product.php" method="post">
        <div class="row mb-4 mt-4">
            <div class="col">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" id="form6Example1" class="form-control" name="name" value="<?= $product["name"] ?>" />
                    <label class="form-label" for="form6Example1">edit product name</label>
                </div>
            </div>
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <textarea class="form-control" id="form6Example7" rows="4" name="description"><?= $product["description"] ?></textarea>
            <label class="form-label" for="form6Example7">edit product description</label>
        </div>

        <select name="admin_id" class="form-select" aria-label="Пример выбора по умолчанию">
            <?php
            foreach ($admins as $admin) { ?>
            <option value="<?= $admin['id'] ?>" <?= ($product['admin_id'] == $admin['id'])?"selected":"" ?>><?= $admin['login'] ?></option>
            <?php } ?>
        </select>

        <input type="hidden" name="id" value="<?= $product["id"] ?>">

        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Save product</button>
    </form>
</div>
</body>
</html>