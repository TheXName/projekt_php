<?php
session_start();
require_once "app/helpers.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/register_form.css">
    <title>Document</title>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

<div class="bform py-5">
    <!-- Row -->
        <div class="container col-lg-6">
            <div class="col-lg-12 align-justify-center pr-4 pl-0 contact-form">
                <div class="">
                    <h2 class="mb-3 font-weight-light">Get Register</h2>
                    <form class="mt-3" action="app/registration.php" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <?php
                                    showError('first_name');
                                    ?>
                                    <input class="form-control" type="text" placeholder="first name" name="first_name" value="<?= (isset($_SESSION['values']['first_name']))?$_SESSION['values']['first_name']:"" ?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <?php
                                    showError('last_name');
                                    ?>
                                    <input class="form-control" type="text" placeholder="last name" name="last_name" value="<?= (isset($_SESSION['values']['last_name']))?$_SESSION['values']['last_name']:"" ?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <?php
                                    showError('email');
                                    ?>
                                    <input class="form-control" type="text" placeholder="email address" name="email" value="<?= (isset($_SESSION['values']['email']))?$_SESSION['values']['email']:"" ?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <?php
                                    showError('login');
                                    ?>
                                    <input class="form-control" type="text" placeholder="login" name="login" value="<?= (isset($_SESSION['values']['login']))?$_SESSION['values']['login']:"" ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php
                                    showError('password');
                                    ?>
                                    <input class="form-control" type="password" placeholder="password" name="password">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php
                                    showError('password_confirm');
                                    ?>
                                    <input class="form-control" type="password" placeholder="confirm password" name="password_confirm">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-md btn-block btn-danger-gradiant text-white border-0"><span> Create Account</span></button>
                                <!-- -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
session_destroy();
?>