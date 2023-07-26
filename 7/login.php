<?php

session_start();
require __DIR__ . '/include/functions.php';
require __DIR__ . '/src/Auth.php';
require __DIR__ . '/src/View.php';
require_once __DIR__ . '/src/Error.php';

$errorData = new ErrorData;
$auth = new Auth;
$arrCurUser = $auth->getCurrentUser();

if ($arrCurUser) {
    header('Location: /');
}

if (isset($_POST['login_user']) && isset($_POST['password_user'])) {
    if ($auth->checkPassword($_POST['login_user'], $_POST['password_user'])) {
        $auth->setCurrentUser($_POST['login_user']);
        header('Location: /');
    } else {
        if (isset($_SESSION)) {
            $errorData->setError('login', 'Неверный логин или пароль');
        }
    }
}

$viewError = new View;
$viewError->assign('error', $errorData->getError('login'));
$contentError = $viewError->render(__DIR__ . '/templates/error_tpl.php');

$view = new View;
$view->assign('arrCurUser', $arrCurUser);
$view->assign('contentError', $contentError);
$view->assign('post', $_POST);
echo $view->render(__DIR__ . '/templates/login_tpl.php');