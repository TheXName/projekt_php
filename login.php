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
                <h2 class="mb-3 font-weight-light">Login</h2>
                <form class="mt-3" action="app/login.php" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php
                                showError('login_error');
                                showError('login');
                                ?>
                                <input class="form-control" type="text" placeholder="login" name="login" value="<?= (isset($_SESSION['values']['login']))?$_SESSION['values']['login']:"" ?>">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php
                                showError('password');
                                ?>
                                <input class="form-control" type="password" placeholder="password" name="password">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-md btn-block btn-danger-gradiant text-white border-0"><span> Welcome again!</span></button>
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