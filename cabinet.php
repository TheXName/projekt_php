<?php
session_start();

require_once "app/repositories/UserRepository.php";
require_once "app/models/User.php";

if (isset($_SESSION['user_login'])) {
    echo $_SESSION['user_login'];
} else {
    header("location:login.php");
}

$user = User::currentUser();

if ($user) {
    if ($user->isAdmin()) {
        header("location:admin/admin_panel.php");
        exit();
    }
} else {
    header("location:login.php");
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
    <title>Document</title>
</head>
<body>
<h1>user cabinet</h1>
</body>
</html>
