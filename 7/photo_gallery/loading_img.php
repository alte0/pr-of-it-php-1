<?php

session_start();
require __DIR__ . '/../include/functions.php';
require __DIR__ . '/../src/Uploader.php';
require_once __DIR__ . '/../src/Error.php';

$location = 'Location: /photo_gallery';

if (isset($_FILES['files']) && is_array($_FILES['files']) && in_array(4, array_values($_FILES['files']['error']))) {
    $errorData = new ErrorData;
    $errorData->setError('filesError', 'Вы не выбрали файл/ы для загрузки');

    header($location);
} elseif (isset($_FILES['files']) && is_array($_FILES['files'])) {
    $uploader = new Uploader($_FILES['files']);
    $uploader->startingUploaded();

    header($location);
} else {
    die('Ошибка');
}