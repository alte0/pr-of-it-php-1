<?php

require '../include/include.php';
$pathGallery = __DIR__ . '/' . $dirImages;
$gallary = getFilesInDir($pathGallery);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ДЗ 4</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
            crossorigin="anonymous"
    >
</head>
<body>
    <div class="container">
        <div class="py-3">
            <form action="loading_img.php" method="post" enctype="multipart/form-data">
                <input type="text" hidden value="<?= $_SERVER['REQUEST_URI'] ?>" name="redirect">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Загрузить новое изображение (Можно выбрать больше одного. Разрешены: <?= implode(', ', array_keys($arrAllowLoadImages)) ?>)</label>
                    <input class="form-control" type="file" id="formFile" name="files[]" accept="image/*" multiple autocomplete="off">
                </div>
                <?php showError(); ?>
                <div>
                    <button class="btn btn-success" type="submit">Загрузить</button>
                </div>
            </form>
        </div>
        <div class="row row-cols-md-1 row-cols-xl-4 gy-4">
            <?php foreach ($gallary as $image): ?>
                <div class="col-12">
                    <img src="<?= $_SERVER["REQUEST_URI"] . $dirImages . $image ?>" class="d-block w-100" alt="">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"
    ></script>
</body>
</html>
