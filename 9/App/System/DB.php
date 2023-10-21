<?php

namespace App\System;

class DB
{
    private \PDO $dbh;
    private \PDOStatement $sth;

    public function __construct()
    {
        $arrConfigDB = require __DIR__ . '/../../configs/config_mysql.php';

        try {
            $this->dbh = new \PDO($arrConfigDB['dsn'], $arrConfigDB['user'], $arrConfigDB['password']);
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function execute(string $sql): bool
    {
        $this->sth = $this->dbh->query($sql);

        return boolval($this->sth);
    }

    public function fetchData():array
    {
        return $this->sth->fetchAll();
    }

    public function query(string $sql, array $data = []): bool|array
    {
        $this->sth = $this->dbh->prepare($sql);

        if ($this->sth->execute($data)) {
            return $this->fetchData();
        }

        return false;
    }
}