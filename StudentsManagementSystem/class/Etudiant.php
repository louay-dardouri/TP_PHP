<?php 

class Etudiant{
    private $_conn;
    private $_table = "etudiant";
    
    public function __construct($db){
        $this->_conn = $db;
    }
    public function listEtudiants(){
        $query = 'Select * from '.$this->_table;
        $res = $this->_conn->query($query);
        return $res->fetchAll(PDO::FETCH_ASSOC);

    }

    public function listEtudiantsByName(string $name){
        $query = 'Select * from '.$this->_table.' where name like :name';
        $name = "%".$name."%";
        $st = $this->_conn->prepare($query);
        $st->execute(['name' => $name]);
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function listEtudiantsBySection(int $section){
        $query = 'Select * from '.$this->_table.' where section = :section';
        $st = $this->_conn->prepare($query);
        $st->execute(['section' => $section]);
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getEtudiantById(int $id){
        $query = 'SELECT * FROM' . $this->_table.'where id = :id';
        $st = $this->_conn->prepare($query);
        $st->execute(['id' => $id]);
        return $st->fetchALL(PDO::FETCH_ASSOC);
    }
}