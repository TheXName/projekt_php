<?php

//require_once "../models/User.php";

class UserRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllUsers()
    {

    }

    public function saveUser(User $user)
    {
        $sql = "INSERT INTO `users` (`id`, `first_name`, `last_name`, `login`, `email`, `password`, `role`) 
        VALUES (:id, :first_name, :last_name, :login, :email, :password, :role)";

        $statement = $this->pdo->prepare($sql);
        $statement->execute($user->toArray());
    }

    public function auth($data)
    {

        $data = array_intersect_key($data, array_flip(['password', 'login']));

        $sql = 'SELECT * FROM `users` WHERE login = :login AND password = :password';

        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        var_dump($user);

        if ($user) {
            $_SESSION['user_login'] = $user['login'];
            return true;
        } else {
            $_SESSION["login_error"] = "There is no user with this credentials ";
            return false;
        }
    }

    public static function getUserByLogin($login)
    {
        $pdo = require __DIR__."/../pdo.php";
        $sql = "SELECT * FROM `users` WHERE login = :login";
        $statement = $pdo->prepare($sql);
        $statement->execute([':login' => $login]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return User::create($user);
    }

    public function getAdmins() {
        $sql = "SELECT * FROM `users` WHERE role = 2";
        $result = $this->pdo->query($sql);
        $admins = $result-> fetchAll(PDO::FETCH_ASSOC);
        return $admins;
    }
}