<?php

class Product
{
    private $id;

    private $admin_id;

    private $name;

    private $description;

    public function __construct($id, $admin_id, $name, $description)
    {
        $this->id = $id;
        $this->admin_id = $admin_id;
        $this->name = $name;
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getAdminId()
    {
        return $this->admin_id;
    }

    public function setAdminId($admin_id): void
    {
        $this->admin_id = $admin_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'admin_id' => $this->admin_id,
            'name' => $this->name,
            'description' => $this->description
        ];
    }

    public static function create(array $data): Product
    {
        if (!isset($data['id'])) {
            $data['id'] = null;
        }

        if (!isset($data['admin_id'])) {
            $data['admin_id'] = null;
        }

        $product = new Product(
            $data['id'],
            $data['admin_id'],
            $data['name'],
            $data['description']
        );
        return $product;
    }
}