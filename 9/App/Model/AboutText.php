<?php

namespace App\Model;

class AboutText
{
    private \App\System\DB $db;

    public function __construct()
    {
        $this->db = new \App\System\DB();
    }

    public function getData(): array
    {
        $strSql = 'SELECT * FROM about LIMIT 1';

        if ($this->db->execute($strSql)){
            $data = $this->db->fetchData();

            if (!empty($data)) {
                return $data[0];
            }
        }

        return [];
    }

    public function addItem(array $post):void
    {
        $strSqlAboutNew = 'INSERT INTO about (text) VALUE (:text)';
        $dataPrepare = [
            ':text' => $post['newText'],
        ];

        $result = $this->db->query($strSqlAboutNew, $dataPrepare);

        if (!$result && !is_array($result)) {
            $this->setError('Ошибка базы данных');
        }
    }

    public function updateItem(array $post):void
    {
        $strSqlAboutUpdate = 'UPDATE about SET text = :text WHERE id = :id';
        $dataPrepare = [
            ':text' => $post['newText'],
            ':id' => $post['idAbout'],
        ];

        $result = $this->db->query($strSqlAboutUpdate, $dataPrepare);

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