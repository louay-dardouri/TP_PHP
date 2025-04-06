<?php

abstract class Repository implements IRepository{
    private $_conn;
    private $_table;

    public function __construct($db,$tableName)
    {
        $this->_table = $tableName;
        $this->_conn = $db;
    }

    public function findAll()
    {
        $query = "SELECT * FROM $this->_table";
        $res = $this->_conn->query($query);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id){
        $stmt = $this->_conn->prepare("SELECT * FROM {$this->_table} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res ? $res : null;
    }
}