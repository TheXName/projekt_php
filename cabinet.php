<?php
session_start();

if (isset($_SESSION['user_login'])) {
    echo $_SESSION['user_login'];
} else {
    header("location:login.php");
}