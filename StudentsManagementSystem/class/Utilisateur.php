<?php
include_once 'ConnexionDB.php';
class Utilisateur{
    private $_id;
    private $_username;
    private $_email;
    private $_role;
    private $_conn;
    private $_table = "utilisateur";

    public function __construct($db){
        $this->_conn = $db;
    }
    public function isAdmin($id) {
        $query = "SELECT role FROM " . $this->_table . " WHERE id = :id";
        $stmt = $this->_conn->prepare($query);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($row && $row['role'] == 'admin');
    }
    
}


