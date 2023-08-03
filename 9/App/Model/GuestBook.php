<?php

namespace App\Model;

class GuestBook
{
    private \App\System\DB $db;

    public function __construct()
    {
        $this->db = new \App\System\DB();
    }

    public function getItems(): array
    {
        $strSql = 'SELECT * FROM guest_book';

        if ($this->db->execute($strSql)) {
            $data = $this->db->fetchData();

            if (!empty($data)) {
                return $data;
            }
        }

        return [];
    }

    public function addItem($newRecord):void
    {
        $strSqlNewRecord = 'INSERT INTO guest_book (text) VALUES (:text)';
        $dataPrepare = [
            ':text' => $newRecord,
        ];
        $result = $this->db->query($strSqlNewRecord, $dataPrepare);

        if (!$result && !is_array($result)) {
            $this->setError('Ошибка базы данных');
        }
    }

    public function deleteItem(string|int $id):void
    {
        $strSqlDeleteRecord = 'DELETE FROM guest_book WHERE id = :id';
        $dataPrepare = [
            ':id' => $id,
        ];
        $result = $this->db->query($strSqlDeleteRecord, $dataPrepare);

        if (!$result && !is_array($result)) {
            $this->setError('Ошибка базы данных');
        }
    }

    private function setError(string $data):void
    {
        $temporaryDataStore = new \App\Model\TemporaryDataStore();
        $temporaryDataStore->setData('error', $data);
    }
}