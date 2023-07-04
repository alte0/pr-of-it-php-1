<?php
require '../include/include.php';

if (
    isset($_FILES['files']) && is_array($_FILES['files'])
) {
    $filesError = array_filter($_FILES['files']['error'], function ($itemError) {
        return $itemError > 0;
    });

    $isNoError = empty($filesError);

    if ($isNoError) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        foreach ($_FILES['files']['tmp_name'] as $index => $tmp_name) {
            $mimeTypeFile = finfo_file($finfo, $tmp_name);

            if (!in_array($mimeTypeFile, getAllowLoadImages())) {
                $_SESSION['error'][] = 'Изображения с данным типом расширения запрещены.';
                break;
            }

            $userName = basename($_FILES["files"]["name"][$index]);

            $newPathImage = getDirImages() . $userName;
            move_uploaded_file($tmp_name, $newPathImage);


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