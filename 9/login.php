<?php

session_start();
require __DIR__ . '/autoload.php';

$headerParam = 'Location: /';
$temporaryDataStore = new \App\Model\TemporaryDataStore();
$auth = new \App\Model\Auth();
$arrCurUser = $auth->getCurrentUser();

if ($arrCurUser) {
    header($headerParam);
}

if (isset($_POST['login_user']) && isset($_POST['password_user'])) {
    if ($auth->checkPassword($_POST['login_user'], $_POST['password_user'])) {
        $auth->setCurrentUser($_POST['login_user']);

        header($headerParam);
    } else {
        if (isset($_SESSION)) {
            $temporaryDataStore->setData('login', 'Неверный логин или пароль');
        }
    }
}

$viewError = new \App\System\View();
$viewError->assign('error', $temporaryDataStore->getData('login'));
$contentError = $viewError->render(__DIR__ . '/templates/error_tpl.php');

$view = new \App\System\View();
$view->assign('arrCurUser', $arrCurUser);
$view->assign('contentError', $contentError);
$view->assign('post', $_POST);
echo $view->render(__DIR__ . '/templates/login_tpl.php');