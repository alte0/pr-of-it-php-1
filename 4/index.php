<?php

require __DIR__ . '/include/include.php';

$arrLinksList = [
    [
        'HREF' => 'guest_book',
        'TEXT' => 'Гостевая книга',
    ],
    [
        'HREF' => 'photo_gallery',
        'TEXT' => 'Фотогалерея',
    ],
];

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ДЗ 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h3>ДЗ 4</h3>
    <ul class="">
        <?php foreach ($arrLinksList as $link) { ?>
            <li class="">
                <a href="<?php echo($_SERVER['REQUEST_URI'] . $link['HREF']) ?>"><?php echo $link['TEXT'] ?></a>
            </li>
        <?php } ?>
    </ul>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
