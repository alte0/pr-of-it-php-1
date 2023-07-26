<?php

class TextFile
{
    protected array $arrData = [];
    private string $pathTextFile = '';

    public function __construct(string $pathTextFile)
    {
        if (!is_dir($pathTextFile) && is_readable($pathTextFile)) {
            $arrData = file($pathTextFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if (is_array($arrData)) {
                $this->arrData = $arrData;
                $this->pathTextFile = $pathTextFile;
            }
        }
    }

    public function append(string $text): object
    {
        $this->arrData[] = trim($text);

        return $this;
    }

    public function save(): void
    {
        if (!empty($this->pathTextFile)) {
            file_put_contents($this->pathTextFile, implode(PHP_EOL, $this->arrData));
        }
    }
}