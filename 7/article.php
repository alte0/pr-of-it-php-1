<?php
require __DIR__ . '/src/View.php';
require __DIR__ . '/src/News.php';

$article = [];
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
    $news = new News();
    $arrArticles = $news->getItems();

    if (key_exists($_GET['id'], $arrArticles)) {
        $article = $arrArticles[$_GET['id']];
    }
}

$view = new View;

if ($article instanceof Article) {
    $view->assign('article', $article);
}
echo $view->render(__DIR__ . '/templates/article_tpl.php');