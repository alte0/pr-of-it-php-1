<?php

class DB
{
    private PDO $dbh;
    private PDOStatement $sth;

    public function __construct()
    {
        $arrConfigDB = require __DIR__ . '/../configs/config_mysql.php';

        $this->dbh = new PDO($arrConfigDB['dsn'], $arrConfigDB['user'], $arrConfigDB['password']);
    }

    public function execute(string $sql): bool|PDOStatement
    {
        return $this->sth = $this->dbh->query($sql);
    }

    public function fetchData():array
    {
        return $this->sth->fetchAll();
    }

    public function query(string $sql, array|null $data = null): bool|array
    {
        $this->sth = $this->dbh->prepare($sql);

        if ($this->sth->execute($data)) {
            return $this->fetchData();
        }

        return false;
    }
}