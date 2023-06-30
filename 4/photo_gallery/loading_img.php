<?php
require '../include/include.php';

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_FILES['files']) && is_array($_FILES['files']) &&
    isset($_POST['redirect']) && $_POST['redirect']
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

    header("Location: " . $_POST['redirect']);
} else {
    die('Ошибка');
}