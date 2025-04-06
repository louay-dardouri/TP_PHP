<?php

class Etudiant
{
    private $_conn;

    private $_table = 'etudiant';

    public function __construct($db)
    {
        $this->_conn = $db;
    }

    public function listEtudiants()
    {
        $query = 'Select E.id, name, birthday, image, S.designation as section
                  from '.$this->_table.' E
                  join section S on E.section = S.id';
        $res = $this->_conn->query($query);

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listEtudiantsByName(string $name)
    {
        $query = 'Select E.id, name, birthday, image, S.designation as section, S.id as section_id
                  from '.$this->_table.' E
                  join section S on E.section = S.id
                  where E.name like :name';
        $name = '%'.$name.'%';
        $st = $this->_conn->prepare($query);
        $st->execute(['name' => $name]);

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listEtudiantsBySection(int $section)
    {
        $query = 'Select E.id, name, birthday, image, S.designation as section, S.id as section_id
                  from '.$this->_table.' E
                  join section S on S.id = E.section
                  where S.id = :section';
        $st = $this->_conn->prepare($query);
        $st->execute(['section' => $section]);

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEtudiantById(int $id)
    {
        $query = 'Select E.id, name, birthday, image, S.designation as section, S.id as section_id
                  from '.$this->_table.' E
                  join section S on S.id = E.section
                  where E.id = :id';
        $st = $this->_conn->prepare($query);
        $st->execute(['id' => $id]);

        return $st->fetch(PDO::FETCH_ASSOC);
    }
}
