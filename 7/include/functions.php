<?php
function getPathGuestBook()
{
    return __DIR__ . '/../guest_book/data.txt';
}

function getFilesInDir($dir)
{
    if (is_dir($dir)) {
        $arrIgnoreList = ['.', '..'];
        $files = scandir($dir);

        if (is_array($files)) {
            return array_diff($files, $arrIgnoreList);
        }
    }

    return [];
}

function logger($data)
{
    $dirLog = __DIR__ . '/../logs/';
    $pathFileLog = $dirLog . 'log.txt';

    if (!is_dir($dirLog)) {
        mkdir($dirLog, 0700);
    }

    if (is_array($data) && count($data)) {
        file_put_contents($pathFileLog, implode(' ; ', $data) . PHP_EOL, FILE_APPEND);
    }
}