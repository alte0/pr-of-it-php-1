<?php

require_once __DIR__ . '/Error.php';

class Uploader
{
    private array $fieldFile = [];

    public function __construct($fieldFile = [])
    {
        if (is_array($fieldFile) && count($fieldFile)) {
            $this->fieldFile = $fieldFile;
        }
    }

    public function startingUploaded(): void
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);


        $errorData = new ErrorData;

        foreach ($this->fieldFile['tmp_name'] as $index => $tmpName) {
            if ($this->fieldFile['error'][$index] > 0) {
                $errorData->setError('filesError', 'Ошибка загрузки');

                continue;
            }

            $mimeTypeFile = finfo_file($finfo, $tmpName);
            $userFileName = basename($this->fieldFile["name"][$index]);

            if (!in_array($mimeTypeFile, $this->getAllowLoadImages())) {
                $textError = 'Изображение "' . $userFileName . '" с данным типом расширения запрещено загружать!';
                $errorData->setError('filesError', $textError);

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
                $errorData->setError('filesError', 'Изображение ' . $tmpName . ' не загружено');

                continue;
            }
        }

        finfo_close($finfo);
    }

    private function isUploaded(string $tmpName): bool
    {
        return is_uploaded_file($tmpName);
    }

    private function upload($tmpName, $newPathImage): void
    {
        move_uploaded_file($tmpName, $newPathImage);
    }

    public function getAllowLoadImages(): array
    {
        return [
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'webp' => 'image/webp',
        ];
    }

    public function getDirImages(): string
    {
        return 'images/';
    }
}