<?php

require_once __DIR__ . '/Article.php';

class News
{
    protected array $arrData = [];

    public function __construct()
    {
        $pathFileNews = __DIR__ . '/../data_news.txt';

        $this->getNewsFromFile($pathFileNews);
    }

    protected function getNewsFromFile(string $pathTextFile): void
    {
        if (!is_dir($pathTextFile) && is_readable($pathTextFile)) {
            $arrData = file($pathTextFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if (is_array($arrData)) {
                foreach ($arrData as $id => $strData) {
                    $this->arrData[$id + 1] = new Article($strData);
                }
            }
        }
    }

    public function getItems(): array
    {
        return $this->arrData;
    }
}