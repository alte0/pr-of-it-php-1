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

    public function execute(array|null $data): bool
    {
        return $this->sth->execute($data);
    }

    public function query(string $sql, array|null $data = null): bool|array
    {
        $this->sth = $this->dbh->prepare($sql);

        if ($this->execute($data)) {
            return $this->sth->fetchAll();
        }

        return false;
    }
}