<?php

class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getProfileById($id){
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        if($this->db->rowCount() > 0) return $row;
        else return false;
    }

    public function updateAvatarProfile($data) {
        $this->db->query('UPDATE users SET avatar=:avatar WHERE id=:id');
        $this->db->bind(':avatar', $data['avatar']);
        $this->db->bind(':id', $data['id']);

        if($this->db->execute()) return true;    
        else return false;
    }

    public function deleteAvatarProfile($id) {
        $this->db->query('UPDATE users SET avatar=:avatar WHERE id=:id');
        $this->db->bind(':avatar', null);
        $this->db->bind(':id', $id);

        if($this->db->execute()) return true;    
        else return false;
    }
}