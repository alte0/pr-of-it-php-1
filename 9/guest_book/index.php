<?php

session_start();
require __DIR__ . '/../autoload.php';

$guestBook = new \App\Model\GuestBook();

$auth = new \App\Model\Auth;
$arrCurUser = $auth->getCurrentUser();

$temporaryDataStore = new \App\Model\TemporaryDataStore();


$viewError = new \App\System\View();
$viewError->assign('error', $temporaryDataStore->getData('error'));
$contentError = $viewError->render(__DIR__ . '/../templates/error_tpl.php');

$viewErrorAdd = new \App\System\View();
$viewErrorAdd->assign('error', $temporaryDataStore->getData('errorAdd'));
$contentErrorAdd = $viewErrorAdd->render(__DIR__ . '/../templates/error_tpl.php');

$view = new \App\System\View();
$view->assign('arrDataGuestBook', $guestBook->getItems());
$view->assign('arrCurUser', $arrCurUser);
$view->assign('contentError', $contentError);
$view->assign('contentErrorAdd', $contentErrorAdd);
echo $view->render(__DIR__ . '/../templates/guest_book_tpl.php');

