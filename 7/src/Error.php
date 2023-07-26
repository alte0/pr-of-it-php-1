<?php

class ErrorData
{
    public function setError(string $key, string $value): void
    {
        if (isset($_SESSION)) {
            $_SESSION['error'][$key][] = $value;
        }
    }

    public function getError(string $key): mixed
    {
        $dataError = null;

        if (isset($_SESSION['error'][$key]) && $_SESSION['error'][$key]) {
            $dataError = $_SESSION['error'][$key];
            unset($_SESSION['error'][$key]);
        }

        return $dataError;
    }
}