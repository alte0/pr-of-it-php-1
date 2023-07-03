<?php
require '../include/include.php';

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['record']) && $_POST['record'] &&
    isset($_POST['redirect']) && $_POST['redirect']
) {
    $arrDataGuestBook = getDataFile(getPathGuestBook());
    $arrDataGuestBook[] = strip_tags($_POST['record']) . PHP_EOL;
    file_put_contents(getPathGuestBook(), $arrDataGuestBook);
    header('Location: ' . $_POST['redirect']);
} else {
    die('Ошибка');
}