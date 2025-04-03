<?php 

class Etudiant{
    private $_conn;
    private $_table = "etudiant";
    
    public function __construct($db){
        $this->_conn = $db;
    }
    public function listEtudiants(){
        $query = 'Select * from student;';
        $res = $this->_conn->query($query);
        return $res->fetchAll();

    }

    public function listEtudiantsByName(string $name){
        $query = 'Select * from student where name like %:name%;';
        $st = $this->_conn->prepare($query);
        $st->execute(['name' => $name]);
        return $st->fetchAll();
    }
    
    public function listEtudiantsBySection(int $section){
        $query = 'Select * from student where section = :section';
        $st = $this->_conn->prepare($query);
        $st->execute(['section' => $section]);
        return $st->fetchAll();
    }
}