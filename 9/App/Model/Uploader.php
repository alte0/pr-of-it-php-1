<?php

namespace App\Model;

class Uploader
{
    private string $nameFieldFile;
    private array $errorText = [];
    private array $logs = [];

    public function __construct($fieldFile = '')
    {
        if (!empty($fieldFile) && isset($_FILES[$fieldFile])) {
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

                    $resultUpload = $this->upload($tmpName, $newPathImage);
                    if ($resultUpload) {
                        $this->addImageInDB($userFileName);
                    }
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
        return move_uploaded_file($tmpName, $newPathImage);
    }

    private function addImageInDB($fileName)
    {
        $gallery = new \App\Model\Gallery();
        $gallery->addItem($fileName);
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