<?php
require '../include/include.php';

if (isset($_POST['record']) && $_POST['record']) {
    $arrDataGuestBook = getDataFile(getPathGuestBook());
    $arrDataGuestBook[] = strip_tags($_POST['record']) . PHP_EOL;
    file_put_contents(getPathGuestBook(), $arrDataGuestBook);
    header('Location: /guest_book');
} else {
    die('Ошибка');
}