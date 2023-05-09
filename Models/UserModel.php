<?php

class UserModel
{
    private Db $db;

    public function __construct()
    {
        $this->db = new Db;
    }

    public function findUserById($id)
    {
        return $this->db->getById($id, 'User');
    }

    public function findUserByName($name)
    {
        $this->db->query('SELECT * FROM `User` WHERE name = :name');
        $this->db->bind(':name', $name);
        return $this->db->single();
    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM `User` WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function addUser($data)
    {
        $this->db->query('INSERT INTO `User` (name, email, password) VALUES (:name, :email,  :password)');
        $this->db->bind(":name", $data['name']);
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":password", $data['password']);
        $this->db->execute();
    }
}