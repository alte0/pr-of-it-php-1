<?php
require __DIR__ . '/../include/include.php';

if (
    isset($_FILES['files']) && is_array($_FILES['files'])
) {
    $filesError = array_filter($_FILES['files']['error'], function ($itemError) {
        return $itemError > 0;
    });

    $isNoError = empty($filesError);

    if ($isNoError) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        foreach ($_FILES['files']['tmp_name'] as $index => $tmpName) {
            $mimeTypeFile = finfo_file($finfo, $tmpName);
            $userFileName = basename($_FILES["files"]["name"][$index]);

            if (!in_array($mimeTypeFile, getAllowLoadImages())) {
                $_SESSION['error'][] = 'Изображение "' . $userFileName . '" с данным типом расширения не загружено.';
                continue;
            }

            if (!is_uploaded_file($tmpName)) {
                $_SESSION['error'][] = 'Ошибка загрузки ' . $userFileName;
            }

            $newPathImage = getDirImages() . $userFileName;
            move_uploaded_file($tmpName, $newPathImage);


            if ($_SESSION['USER']) {
                $arrLog = [];
                $arrLog[] = $_SESSION['USER']['name'];
                $arrLog[] = $newPathImage;
                logger($arrLog);
            }
        }

        finfo_close($finfo);
    } else {
        $_SESSION['error'][] = 'Ошибка загрузки.';
    }

    header('Location: /photo_gallery');
} else {
    die('Ошибка');
}