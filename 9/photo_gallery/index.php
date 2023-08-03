<?php

session_start();
require __DIR__ . '/../autoload.php';

$auth = new \App\Model\Auth();
$arrCurUser = $auth->getCurrentUser();

$uploader = new \App\Model\Uploader();
$allowUploadImages = array_keys($uploader->getAllowLoadImages());

$gallery = new \App\Model\Gallery();

$temporaryDataStore = new \App\Model\TemporaryDataStore();

$viewError = new \App\System\View();
$viewError->assign('error', $temporaryDataStore->getData('error'));
$contentError = $viewError->render(__DIR__ . '/../templates/error_tpl.php');

$view = new \App\System\View();
$view->assign('arrImages', $gallery->getItems());
$view->assign('allowUploadImages', $allowUploadImages);
$view->assign('arrCurUser', $arrCurUser);
$view->assign('contentError', $contentError);
echo $view->render(__DIR__ . '/../templates/photo_gallery_tpl.php');
