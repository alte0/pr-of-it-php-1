<?php

namespace App\Model;
class TemporaryDataStore
{
    public function setData(string $keyName, string|array $data): void
    {
        if (isset($_SESSION) && !empty($data)) {
            $_SESSION[$keyName] = $data;
        }
    }

    public function getData(string $keyName): string
    {
        $str = '';

        if (isset($_SESSION[$keyName])) {
            if (is_array($_SESSION[$keyName])) {
                $str = implode('</br>', $_SESSION[$keyName]);
            } else {
                $str = $_SESSION[$keyName];
            }

            $this->unset($keyName);
        }

        return $str;
    }

    private function unset(string $keyName): void
    {
        if (isset($_SESSION[$keyName])) {
            unset($_SESSION[$keyName]);
        }
    }
}