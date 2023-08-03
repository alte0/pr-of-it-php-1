<?php

require __DIR__ . '/../autoload.php';

if (isset($_POST['selectedId']) && $_POST['selectedId'] > 0) {
    $guestBook = new \App\Model\GuestBook();
    $guestBook->deleteItem($_POST['selectedId']);

    header('Location: /guest_book');
} else {
    die('Ошибка');
}