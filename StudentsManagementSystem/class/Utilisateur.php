<?php
include_once 'ConnexionDB.php';
class Utilisateur{
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
    public function addEtudiant($id, $name, $birthday, $image, $section): int {
        if (!$this->isAdmin($id)) {
            return -1;
        }
        $query = "INSERT INTO etudiant (name, birthday, image, section) VALUES (:name, :birthday, :image, :section)";
        $res = $this->_conn->prepare($query);
        $res->execute(['name' => $name, 'section' => $section, 'birthday' => $birthday, 'image' => $image]);
        return $this->_conn->lastInsertId();
    }
    public function updateEtudiant($id_user, $id, $name, $birthday, $image, $section): int {
        if (!$this->isAdmin($id_user)) {
            return -1;
        }
        $query = "UPDATE etudiant SET name = :name, birthday = :birthday, image = :image, section = :section WHERE id = :id";
        $res = $this->_conn->prepare($query);
        $res->execute(['id' => $id, 'name' => $name,'birthday' => $birthday, 'image' => $image, 'section' => $section]);
        return $res->rowCount();
    }
    public function deleteEtudiant($id_user, $id): int {
        if (!$this->isAdmin($id_user)) {
            return -1;
        }
        $query = "DELETE FROM etudiant WHERE id = :id";
        $res = $this->_conn->prepare($query);
        $res->execute(['id' => $id]);
        return $res->rowCount();
    }
    public function getUsers() {
        $query = "SELECT id, username, email, role FROM " . $this->_table;
        $res = $this->_conn->prepare($query);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUserById($id) {
        $query = "SELECT id, username, email, role FROM " . $this->_table . " WHERE id = :id";
        $res = $this->_conn->prepare($query);
        $res->execute(['id' => $id]);
        return $res->fetch(PDO::FETCH_ASSOC);
    }
}