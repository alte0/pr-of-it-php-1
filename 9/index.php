<?php

session_start();
require __DIR__ . '/autoload.php';

$text = '';
$idAboutText = 0;
$db = new \App\System\DB();
$temporaryDataStore = new \App\Model\TemporaryDataStore();
$aboutText = new \App\Model\AboutText();

if (isset($_POST['newText']) && !empty($_POST['newText'])){
    if (isset($_POST['idAbout']) && $_POST['idAbout'] > 0){
        $aboutText->updateItem($_POST);
    } else {
        $aboutText->addItem($_POST);
    }

    header('Location: /');
}

$dataText = $aboutText->getData();

if (!empty($dataText)) {
    $text = $dataText['text'];
    $idAboutText = $dataText['id'];
}

$auth = new \App\Model\Auth();
$arrCurUser = $auth->getCurrentUser();

$viewError = new \App\System\View();
$viewError->assign('error', $temporaryDataStore->getData('errorResult'));
$contentError = $viewError->render(__DIR__ . '/templates/error_tpl.php');

$view = new \App\System\View();
$view->assign('arrCurUser', $arrCurUser);
$view->assign('aboutText', $text);
$view->assign('idAboutText', $idAboutText);
$view->assign('contentError', $contentError);

echo $view->render(__DIR__ . '/templates/about_tpl.php');