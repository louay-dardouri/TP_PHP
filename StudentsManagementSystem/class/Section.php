<?php

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
}
