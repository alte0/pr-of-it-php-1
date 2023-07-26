<?php

require_once __DIR__ . '/TextFile.php';
require_once __DIR__ . '/GuestBookRecord.php';

class GuestBook extends TextFile
{
//    protected array $arrData = [];
//    private string $pathTextFile = '';

    public function __construct(string $pathTextFile)
    {
        if (!is_dir($pathTextFile) && is_readable($pathTextFile)) {
            $arrData = file($pathTextFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if (is_array($arrData)) {
                foreach ($arrData as $record) {
                    $this->arrData[] = new GuestBookRecord($record);
                }
                $this->pathTextFile = $pathTextFile;
            }
        }
    }

    public function getData(): array
    {
        return $this->arrData;
    }
}