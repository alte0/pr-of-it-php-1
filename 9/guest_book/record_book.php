<?php

session_start();
require __DIR__ . '/../autoload.php';

if (isset($_POST['record']) && $_POST['record']) {
    $guestBook = new \App\Model\GuestBook();
    $guestBook->addItem($_POST['record']);
} else {
    $temporaryDataStore = new \App\Model\TemporaryDataStore();
    $temporaryDataStore->setData('errorAdd', 'Вы не добавили текст');
}

header('Location: /guest_book');