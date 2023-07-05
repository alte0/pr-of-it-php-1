<?php
require '../include/include.php';

if (
    isset($_FILES['files']) && is_array($_FILES['files'])
) {
    $uploader = new Uploader($_FILES['files']);
    $uploader->startingUploaded();

    header('Location: /photo_gallery');
} else {
    die('Ошибка');
}