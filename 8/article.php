<?php

require __DIR__ . '/src/DB.php';
require __DIR__ . '/src/View.php';

$view = new View;

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
    $db = new DB();
    $strSqlNews = 'SELECT * FROM news WHERE id=:id';
    $data = $db->query($strSqlNews, [':id' => $_GET['id']]);

    if (isset($data[0]) && is_array($data[0])) {
        $view->assign('article', $data[0]);
    }
}

echo $view->render(__DIR__ . '/templates/article_tpl.php');