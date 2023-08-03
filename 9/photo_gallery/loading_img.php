<?php

session_start();
require __DIR__ . '/../autoload.php';

$location = 'Location: /photo_gallery';
$temporaryDataStore = new \App\Model\TemporaryDataStore();

if (isset($_FILES['files']) && is_array($_FILES['files']) && in_array(4, array_values($_FILES['files']['error']))) {
    $temporaryDataStore->setData('error', 'Вы не выбрали файл/ы для загрузки');

    header($location);
} elseif (isset($_FILES['files']) && is_array($_FILES['files'])) {
    $uploader = new \App\Model\Uploader('files');
    $uploader->startingUploaded();
    $temporaryDataStore->setData('error', $uploader->getError());

    header($location);
} else {
    die('Ошибка');
}