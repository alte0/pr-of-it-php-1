<?php
require 'functions.php';
session_start();

$arrLinksList = [
    [
        'HREF' => 'guest_book',
        'TEXT' => 'Гостевая книга',
    ],
    [
        'HREF' => 'photo_gallery',
        'TEXT' => 'Фотогалерея',
    ],
];
$pathGuestBook = '../guest_book/data.txt';
$arrDataGuestBook = getDataFile($pathGuestBook);
$dirImages = 'images/';
$arrAllowLoadImages = [
    'jpg' => 'image/jpeg',
    'png' => 'image/png',
    'webp' => 'image/webp',
];