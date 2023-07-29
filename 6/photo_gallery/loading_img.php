<?php
require __DIR__ . '/../include/include.php';

if (
    isset($_FILES['files']) && is_array($_FILES['files'])
) {
    $uploader = new Uploader('files');
    $uploader->startingUploaded();

    $recordingSession = new TemporaryDataStore();
    $recordingSession->setData('error', $uploader->getError());

    $arrLog = $uploader->getLog();

    if (isset(getCurrentUser()['login'])){
        $arrLog[] = getCurrentUser()['login'];
    }

    logger($arrLog);

    header('Location: /photo_gallery');
} else {
    die('Ошибка');
}