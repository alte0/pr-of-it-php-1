<?php
require __DIR__ . '/../include/include.php';

if (isset($_POST['record']) && $_POST['record']) {
    $arrDataGuestBook = getDataFile(getPathGuestBook());
    $arrDataGuestBook[] = $_POST['record'];
    file_put_contents(getPathGuestBook(), implode(PHP_EOL, $arrDataGuestBook));
    header('Location: /guest_book');
} else {
    die('Ошибка');
}