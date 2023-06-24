<?php
require __DIR__ . '/gallary-dat.php';
$arrImage = [];

if (isset($_GET['id']) && $_GET['id'] > 0){
    $idImg = intval($_GET['id']);
    $indexImage =  array_search($idImg, array_column($gallary, 'ID'));

    if ($indexImage !== false){
        $arrImage = $gallary[$indexImage];
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Изображение по ID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php if (is_array($arrImage) && count($arrImage)): ?>
        <img class="img-fluid" src="<?= $arrImage['SRC'] ?>" alt="<?= $arrImage['ALT'] ?>">
        <?php else: ?>
        <p class="text-center py-3">Изображение не найдено</p>
        <?php endif; ?>
    </div>
</body>
</html>
