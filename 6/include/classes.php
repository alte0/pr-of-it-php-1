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

    public function append(string $text)
    {
        $this->arrData[] = trim($text);

        return $this;
    }

    public function save()
    {
        if (!empty($this->pathTextFile)) {
            file_put_contents($this->pathTextFile, implode(PHP_EOL, $this->arrData));
        }
    }
}

class GuestBook extends TextFile
{
    public function getData()
    {
        return $this->arrData;
    }
}

class Uploader
{
    private array $fieldFile = [];

    public function __construct($fieldFile = [])
    {
        if (is_array($fieldFile) && count($fieldFile)) {
            $this->fieldFile = $fieldFile;
        }
    }

    public function startingUploaded()
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        foreach ($this->fieldFile['tmp_name'] as $index => $tmpName) {
            if ($this->fieldFile['error'][$index] > 0) {
                $_SESSION['error'][] = 'Ошибка загрузки';
                continue;
            }

            $mimeTypeFile = finfo_file($finfo, $tmpName);
            $userFileName = basename($this->fieldFile["name"][$index]);

            if (!in_array($mimeTypeFile, $this->getAllowLoadImages())) {
                $_SESSION['error'][] = 'Изображение "' . $userFileName . '" с данным типом расширения запрещено загружать!';
                continue;
            }

            if ($this->isUploaded($tmpName)) {
                $newPathImage = $this->getDirImages() . $userFileName;

                $this->upload($tmpName, $newPathImage);

                if ($_SESSION['USER']) {
                    $arrLog = [];
                    $arrLog[] = $_SESSION['USER']['name'];
                    $arrLog[] = $newPathImage;
                    logger($arrLog);
                }
            } else {
                $_SESSION['error'][] = 'Изображение ' . $tmpName . ' не загружено';
                continue;
            }
        }

        finfo_close($finfo);
    }

    private function isUploaded(string $tmpName)
    {
        return is_uploaded_file($tmpName);
    }

    private function upload($tmpName, $newPathImage)
    {
        move_uploaded_file($tmpName, $newPathImage);
    }

    public function getAllowLoadImages()
    {
        return [
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'webp' => 'image/webp',
        ];
    }

    public function getDirImages()
    {
        return 'images/';
    }
}