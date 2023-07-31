<?php

require __DIR__ . '/src/DB.php';
require __DIR__ . '/src/View.php';

$sqlStrCommand = "
create table news (id serial, title varchar(50), text varchar(255), author varchar(50));

insert into news (title, text, author) values ('заголовок первый', 'текст новости', 'Петров Пётр');
insert into news (title, text, author) values ('заголовок второй', 'текст новости новости', 'Асахов Артур');
insert into news (title, text, author) values ('заголовок третий', 'текст новости новости новости', 'Фёдоров Дмитрий');
";

$db = new DB();
$strSqlNews = 'SELECT * FROM news ORDER BY id DESC';
$data = [];

if ($db->execute($strSqlNews)){
    $data = $db->fetchData();
}

$view = new View;
$view->assign('arrNews', $data);
echo $view->render(__DIR__ . '/templates/news_tpl.php');
