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
        echo "Hi admin";
    } else {
        echo "Hi user";
    }
}