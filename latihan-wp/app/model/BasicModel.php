<?php

class BasicModel
{
    private $dbase;

    public function __construct()
    {
        $this->dbase = new Database;
    }

    public function getThisQuery($sql)
    {
        $this->dbase->Query($sql);
        return $this->dbase->resultSet();
    }

    public function getWhere($table, $field, $where)
    {
        $query = "SELECT * FROM $table WHERE $field = :field";
        $this->dbase->Query($query);
        $this->dbase->bind('field', $where);
        return $this->dbase->singleResult();
    }

    public function deleteRecord($table, $field, $where)
    {
        $query = "DELETE FROM $table WHERE $field = :field";
        $this->dbase->Query($query);
        $this->dbase->bind('field', $where);
        $this->dbase->executeQuery();
        return $this->dbase->countRows();
    }
}
