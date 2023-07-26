<?php

session_start();
require __DIR__ . '/../include/functions.php';
require __DIR__ . '/../src/Auth.php';
require __DIR__ . '/../src/GuestBook.php';
require __DIR__ . '/../src/View.php';

$guestBook = new GuestBook(getPathGuestBook());
$arrDataGuestBook = $guestBook->getData();

$auth = new Auth;
$arrCurUser = $auth->getCurrentUser();

$view = new View;
$view->assign('arrDataGuestBook', $arrDataGuestBook);
$view->assign('arrCurUser', $arrCurUser);
echo $view->render(__DIR__ . '/../templates/guest_book_tpl.php');

