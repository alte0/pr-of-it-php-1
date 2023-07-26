<?php

session_start();
//require __DIR__ . '/include/functions.php';
require __DIR__ . '/src/Auth.php';
require __DIR__ . '/src/View.php';

$arrLinksList = [
    [
        'href' => '/guest_book',
        'text' => 'Гостевая книга',
    ],
    [
        'href' => '/photo_gallery',
        'text' => 'Фотогалерея',
    ],
    [
        'href' => 'news.php',
        'text' => 'Новости',
    ],
];

$auth = new Auth;
$arrCurUser = $auth->getCurrentUser();

$view = new View;
$view->assign('listMenu', $arrLinksList);
$view->assign('arrCurUser', $arrCurUser);
//$view->display(__DIR__ . '/templates/index_tpl.php');
echo $view->render(__DIR__ . '/templates/index_tpl.php');