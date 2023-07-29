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
    private string $nameFieldFile;
    private array $errorText = [];
    private array $logs = [];

    public function __construct($fieldFile = '')
    {
        if(!empty($fieldFile) && isset($_FILES[$fieldFile])) {
            $this->nameFieldFile = $fieldFile;
        }
    }

    public function startingUploaded()
    {
        if (is_array($_FILES[$this->nameFieldFile])) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $files = $_FILES[$this->nameFieldFile];

            foreach ($files['tmp_name'] as $index => $tmpName) {
                if ($files['error'][$index] > 0) {
                    $this->setError('Ошибка загрузки');

                    continue;
                }

                $mimeTypeFile = finfo_file($finfo, $tmpName);
                $userFileName = basename($files["name"][$index]);

                if (!in_array($mimeTypeFile, $this->getAllowLoadImages())) {
                    $textError = 'Изображение "' . $userFileName . '" с данным типом расширения запрещено загружать!';
                    $this->setError($textError);

                    continue;
                }

                if ($this->isUploaded($tmpName)) {
                    $newPathImage = $this->getDirImages() . $userFileName;

                    $this->upload($tmpName, $newPathImage);

                    $this->setLog($newPathImage);
                } else {
                    $this->setError('Изображение ' . $tmpName . ' не загружено');

                    continue;
                }
            }

            finfo_close($finfo);
        }
    }

    private function isUploaded(string $tmpName)
    {
        return is_uploaded_file($tmpName);
    }

    private function upload($tmpName, $newPathImage)
    {
        move_uploaded_file($tmpName, $newPathImage);
    }

    private function setError(string $textError): void
    {
        $this->errorText[] = $textError;
    }

    public function getError(): array
    {
        return $this->errorText;
    }

    private function setLog(string $textLog): void
    {
        $this->logs[] = $textLog;
    }

    public function getLog(): array
    {
        return $this->logs;
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