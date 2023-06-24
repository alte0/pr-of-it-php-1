<?php

require __DIR__ . '/calculate.php';
require __DIR__ . '/gallary-dat.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ДЗ 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="py-3">
    <div class="container">
        <h2>Калькулятор</h2>
        <form method="get" class="row">
            <div class="col-md-3 mb-3">
                <label for="formControlInput1" class="form-label">Операнд 1</label>
                <input
                    type="number"
                    name="NUM_1"
                    class="form-control"
                    id="formControlInput1"
                    placeholder="введите число"
                    <?php if (isset($_GET["NUM_1"])): ?>
                    value=<?= $_GET["NUM_1"] ?>
                    <?php endif; ?>
                >
            </div>
            <div class="col-md-3 mb-3">
                <label for="formControlSelect" class="form-label">Арифметическая операция</label>
                <select name="SIGN_VALUE" class="form-select" aria-label="Default select example" id="formControlSelect" autocomplete="off">
                    <option
                        <?php if (!isset($_GET["SIGN_VALUE"])): ?>
                        selected
                        <?php endif; ?>
                    >Выберете</option>
                    <?php foreach ($signs as $sing): ?>
                    <option
                        value=<?= $sing ?>
                        <?php if (isset($_GET["SIGN_VALUE"])): ?>
                        <?= $_GET["SIGN_VALUE"] == $sing ? 'selected' : '' ?>
                        <?php endif; ?>
                    ><?= $sing ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="formControlInput2" class="form-label">Операнд 2</label>
                <input
                    type="number"
                    name="NUM_2"
                    class="form-control"
                    id="formControlInput2"
                    placeholder="введите число"
                    <?php if (isset($_GET["NUM_2"])): ?>
                    value=<?= $_GET["NUM_2"] ?>
                    <?php endif; ?>
                >
            </div>
            <div class="col-md-3 mb-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">=</button>
                <?php if ($result): ?>
                <span class="p-2"><?= $result ?></span>
                <?php endif; ?>
            </div>
        </form>
        <h2>Фотогалерея</h2>
        <div class="row row-cols-md-1 row-cols-xl-2 gy-4">
            <?php foreach ($gallary as $image): ?>
            <div class="col-12">
                <a
                        href="image.php?id=<?= $image['ID'] ?>"
                        class="img-fluid"
                        data-bs-interval="2000"
                >
                    <img src="<?= $image['SRC'] ?>" class="d-block w-100" alt="<?= $image['ALT'] ?>">
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
<?php
