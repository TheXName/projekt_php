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
    <form action="/projekt_php/app/add_product.php" method="post">
        <div class="row mb-4 mt-4">
            <div class="col">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" id="form6Example1" class="form-control" name="name" />
                    <label class="form-label" for="form6Example1">product name</label>
                </div>
            </div>
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <textarea class="form-control" id="form6Example7" rows="4" name="description"></textarea>
            <label class="form-label" for="form6Example7">product description</label>
        </div>

        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Add product</button>
    </form>
</div>
</body>
</html>