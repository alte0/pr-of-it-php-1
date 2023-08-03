<?php

namespace App\Model;

class Gallery
{
    private \App\System\DB $db;

    public function __construct()
    {
        $this->db = new \App\System\DB();
    }

    public function getItems(): array
    {
        $strSql = 'SELECT * FROM photo_gallery';

        if ($this->db->execute($strSql)) {
            $data = $this->db->fetchData();

            if (!empty($data)) {
                return $data;
            }
        }

        return [];
    }

    public function addItem($fileName):void
    {
        $strSqlImageNew = 'INSERT INTO photo_gallery (name_file) VALUE (:name)';
        $dataPrepare = [
            ':name' => $fileName,
        ];
        $result = $this->db->query($strSqlImageNew, $dataPrepare);

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