<?php
require __DIR__ . '/src/View.php';
require __DIR__ . '/src/News.php';

$news = new News();

$view = new View;
$view->assign('arrNews', $news->getItems());
echo $view->render(__DIR__ . '/templates/news_tpl.php');