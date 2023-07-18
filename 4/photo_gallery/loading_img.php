<?php
require __DIR__ . '/../include/include.php';

if (
    isset($_FILES['files']) && is_array($_FILES['files'])
) {
    $isNoError = in_array(0, $_FILES['files']['error'], true);

    if ($isNoError) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        foreach ($_FILES['files']['tmp_name'] as $index => $tmp_name) {
            $mimeTypeFile = finfo_file($finfo, $tmp_name);

            if (!in_array($mimeTypeFile, getAllowLoadImages())) {
                $_SESSION['error'][] = 'Изображения с данным типом расширения запрещены.';
                break;
            }

            $userName = basename($_FILES["files"]["name"][$index]);

            move_uploaded_file($tmp_name, getDirImages() . $userName);
        }

        finfo_close($finfo);
    } else {
        $_SESSION['error'][] = 'Ошибка загрузки.';
    }

    header('Location: /photo_gallery');
} else {
    die('Ошибка');
}