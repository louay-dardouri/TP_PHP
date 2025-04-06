<?php

include_once 'IRepository.php';
include_once 'ConnexionDB.php';

abstract class Repository implements IRepository
{
    protected $_conn;

    protected $_table;

    public function __construct($tableName)
    {
        $this->_table = $tableName;
        $this->_conn = ConnexionDB::getInstance();
    }

    public function findAll()
    {
        $query = 'SELECT * FROM '.$this->_table;
        $res = $this->_conn->query($query);

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id)
    {
        $stmt = $this->_conn->prepare("SELECT * FROM {$this->_table} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        return $res ? $res : null;
    }

    public function delete($id)
    {
        $query = 'delete from '.$this->_table.' where id = :id';
        $response = $this->_conn->prepare($query);
        $response->execute(['id' => $id]);
    }
    
    public function create($params)
    {
        $columns = implode(', ', array_keys($params));
        $placeholder = ':'.implode(', :', array_keys($params));
        $query = "INSERT INTO $this->_table ($columns) VALUES ($placeholder)";
        $stmt = $this->_conn->prepare($query);
        $stmt->execute($params);

        return $this->_conn->lastInsertId();
    }
}

