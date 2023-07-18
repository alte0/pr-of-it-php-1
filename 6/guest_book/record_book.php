<?php
require __DIR__ . '/../include/include.php';

if (isset($_POST['record']) && $_POST['record']) {
    $guestBook = new GuestBook(getPathGuestBook());
    $guestBook->append($_POST['record'])->save();

    header('Location: /guest_book');
} else {
    die('Ошибка');
}