<?php

$result = null;
$signs = ['+', '-', '*', '/'];
$images = require __DIR__ . '/images-data.php';
require __DIR__ . '/calculate.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ДЗ 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="py-3">
<div class="container">
    <h2>Калькулятор</h2>
    <form method="get" class="row">
        <div class="col-md-3 mb-3">
            <label for="formControlInput1" class="form-label">Операнд 1</label>
            <input
                    type="number"
                    name="num_1"
                    class="form-control"
                    id="formControlInput1"
                    placeholder="введите число"
                    <?php if (isset($_GET['num_1'])){ ?>
                    value=<?php echo $_GET['num_1']; ?>
                    <?php } ?>
            >
        </div>
        <div class="col-md-3 mb-3">
            <label for="formControlSelect" class="form-label">Арифметическая операция</label>
            <select name="sign_value" class="form-select" aria-label="Default select example" id="formControlSelect"
                    autocomplete="off">
                <option
                    <?php if (!isset($_GET['sign_value'])) { ?>
                        selected
                    <?php } ?>
                >Выберете
                </option>
                <?php foreach ($signs as $sing) { ?>
                    <option
                            value=<?php echo $sing; ?>
                            <?php if (isset($_GET['sign_value'])) { ?>
                                <?php echo $_GET['sign_value'] == $sing ? 'selected' : ''; ?>
                            <?php } ?>
                    ><?php echo $sing; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="formControlInput2" class="form-label">Операнд 2</label>
            <input
                    type="number"
                    name="num_2"
                    class="form-control"
                    id="formControlInput2"
                    placeholder="введите число"
                    <?php if (isset($_GET['num_2'])){ ?>
                    value=<?php echo $_GET['num_2']; ?>
                    <?php } ?>
            >
        </div>
        <div class="col-md-3 mb-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">=</button>
            <?php if (boolval($result)) { ?>
                <span class="p-2"><?php echo $result; ?></span>
            <?php } ?>
        </div>
    </form>
    <h2>Фотогалерея</h2>
    <div class="row row-cols-md-1 row-cols-xl-2 gy-4">
        <?php foreach ($images as $image) { ?>
            <div class="col-12">
                <a href="image.php?id=<?php echo $image['id']; ?>">
                    <img loading="lazy" src="<?php echo $image['src']; ?>" class="d-block w-100"
                         alt="<?php echo $image['alt']; ?>">
                </a>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>