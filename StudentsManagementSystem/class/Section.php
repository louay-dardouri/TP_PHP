<?php

include_once 'ConnexionDB.php';
class Section
{
    private $_conn;

    private $_table = 'section';

    public function __construct($db)
    {
        $this->_conn = $db;
    }

    public function listSections()
    {
        $req = 'Select * from '.$this->_table;
        $res = $this->_conn->query($req);

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listSectionsByName(string $name)
    {
        $query = 'Select * from '.$this->_table.' where designation like :name or description like :name';
        $name = '%'.$name.'%';
        $st = $this->_conn->prepare($query);
        $st->execute(['name' => $name]);

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addSection($designation, $description): int
    {
        $query = 'INSERT INTO section (designation, description) VALUES (:designation, :description)';
        $res = $this->_conn->prepare($query);
        $res->execute(['designation' => $designation, 'description' => $description]);

        return $this->_conn->lastInsertId();
    }

    public function deleteSection($id): int
    {
        $query = 'DELETE FROM section WHERE id = :id';
        $res = $this->_conn->prepare($query);
        $res->execute(['id' => $id]);

        return $res->rowCount();
    }
}
