<?php
session_start();
require_once "../app/models/User.php";
require_once "../app/repositories/UserRepository.php";

$user = User::currentUser();

if ($user) {
    if (!$user->isAdmin()) {
        header("Location: ../cabinet.php");
        exit();
    }
} else {
    header("Location: ../login.php");
    exit();
}
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
    <title>admin panel</title>
</head>
<body>
<?php
include "admin_menu.php";
?>
</body>
</html>
