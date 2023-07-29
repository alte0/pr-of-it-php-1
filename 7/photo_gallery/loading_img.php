<?php

session_start();
require __DIR__ . '/../include/functions.php';
require __DIR__ . '/../src/Uploader.php';
require __DIR__ . '/../src/Auth.php';
require __DIR__ . '/../src/TemporaryDataStore.php';

$location = 'Location: /photo_gallery';
$recordingSession = new TemporaryDataStore();

if (isset($_FILES['files']) && is_array($_FILES['files']) && in_array(4, array_values($_FILES['files']['error']))) {
    $recordingSession->setData('error', 'Вы не выбрали файл/ы для загрузки');

    header($location);
} elseif (isset($_FILES['files']) && is_array($_FILES['files'])) {
    $uploader = new Uploader('files');
    $uploader->startingUploaded();
    $recordingSession->setData('error', $uploader->getError());

    $arrLog = $uploader->getLog();

    $auth = new Auth;

    if (isset($auth->getCurrentUser()['login'])){
        $arrLog[] = $auth->getCurrentUser()['login'];
    }

    logger($arrLog);

    header($location);
} else {
    die('Ошибка');
}