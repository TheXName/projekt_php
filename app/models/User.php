<?php

class User
{
    private $id;
    private $first_name;
    private $last_name;
    private $login;
    private $email;
    private $password;
    private $role;

    public function __construct($id, $first_name, $last_name, $login, $email, $password, $role)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public static function create(array $data):User
    {
        if (!isset($data['id'])) {
            $data['id'] = null;
        }

        if (!isset($data['role'])) {
            $data['role'] = null;
        }

        $user = new User(
            $data['id'],
            $data['first_name'],
            $data['last_name'],
            $data['login'],
            $data['email'],
            $data['password'],
            $data['role']
        );
        return $user;
    }

    public static function currentUser(): ?User
    {
        if (!isset($_SESSION['user_login'])){
            return null;
        }
        return UserRepository::getUserByLogin($_SESSION['user_login']);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($first_name): void
    {
        $this->first_name = $first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name): void
    {
        $this->last_name = $last_name;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login): void
    {
        $this->login = $login;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role): void
    {
        $this->role = $role;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'login' => $this->login,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role
        ];
    }

    public function isAdmin(): bool
    {
        return ($this->role == '2');
    }
}