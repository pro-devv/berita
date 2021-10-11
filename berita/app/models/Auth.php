<?php

class Auth {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function findUserByEmailOrUsername($email, $username){
        $this->db->query('SELECT * FROM users WHERE username = :username OR email = :email');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if($this->db->rowCount() > 0) return $row;
        else return false;
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (avatar, firstname, lastname, birthdate, sex, email, username, password, roles_id) 
        VALUES (:avatar, :firstname, :lastname, :birthdate, :sex, :email, :username, :password, :roles_id)'); 
        $this->db->bind(':avatar', $data['avatar']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':birthdate', $data['birthdate']);
        $this->db->bind(':sex', $data['sex']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':roles_id', 2);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        
        if($this->db->execute()) return true;    
        else return false;
    }

    public function login($nameOrEmail, $password) {
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if($row == false) return false;

        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) return $row;
        else return false;    
    }
}