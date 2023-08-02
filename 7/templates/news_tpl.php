<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ДЗ 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h3>Новости</h3>
    <div class="row row-cols-md-1 row-cols-xl-4 gy-4">
        <?php
        if (isset($arrNews)) {
            foreach ($arrNews as $id => $news) {
                list($title, $desc) = $news->getArticle();
                ?>
                <div class="col-12">
                    <h3>
                        <a href="/article.php?id=<?php echo $id; ?>"><?php echo $title; ?></a>
                    </h3>
                    <p><?php echo $desc; ?></p>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <div class="py-3">
        <a href="/">на главную</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>