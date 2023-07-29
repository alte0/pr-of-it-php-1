<?php

session_start();
require __DIR__ . '/../include/functions.php';
require __DIR__ . '/../src/Uploader.php';
require __DIR__ . '/../src/Auth.php';
require __DIR__ . '/../src/TemporaryDataStore.php';
require __DIR__ . '/../src/View.php';


$temporaryDataStore = new TemporaryDataStore();

$viewError = new View;
$viewError->assign('error', $temporaryDataStore->getData('error'));
$contentError = $viewError->render(__DIR__ . '/../templates/error_tpl.php');

$auth = new Auth;
$arrCurUser = $auth->getCurrentUser();

$uploader = new Uploader();
$pathImages = __DIR__ . '/' . $uploader->getDirImages();
$arrImages = getFilesInDir($pathImages);
$allowUploadImages = array_keys($uploader->getAllowLoadImages());


$view = new View;
$view->assign('arrImages', $arrImages);
$view->assign('allowUploadImages', $allowUploadImages);
$view->assign('arrCurUser', $arrCurUser);
$view->assign('contentError', $contentError);
echo $view->render(__DIR__ . '/../templates/photo_gallery_tpl.php');
