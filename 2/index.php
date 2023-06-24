<?php

// Функции
require __DIR__ . '/functions.php';
// Тесты для функций
require __DIR__ . '/tests.php';

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ДЗ 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="p-3">
    <h2>Задание 1. Таблицы истинности логических операторов</h2>
    <div class="table-responsive">
        <table class="table caption-top">
            <caption>Tаблица истинности логического оператора &&</caption>
            <thead class="table-light">
                <tr>
                    <td>A</td>
                    <td>B</td>
                    <td>A && B</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $a = false;
                    $b = false;
                    ?>
                    <th><?php echo (int)$a; ?></th>
                    <th><?php echo (int)$b; ?></th>
                    <th><?php echo (int)($a && $b); ?></th>
                </tr>
                <tr>
                    <?php
                    $a = false;
                    $b = true;
                    ?>
                    <th><?php echo (int)$a; ?></th>
                    <th><?php echo (int)$b; ?></th>
                    <th><?php echo (int)($a && $b); ?></th>
                </tr>
                <tr>
                    <?php
                    $a = true;
                    $b = false;
                    ?>
                    <th><?php echo (int)$a; ?></th>
                    <th><?php echo (int)$b; ?></th>
                    <th><?php echo (int)($a && $b); ?></th>
                </tr>
                <tr>
                    <?php
                    $a = true;
                    $b = true;
                    ?>
                    <th><?php echo (int)$a; ?></th>
                    <th><?php echo (int)$b; ?></th>
                    <th><?php echo (int)($a && $b); ?></th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table caption-top">
            <caption>Tаблица истинности логического оператора ||</caption>
            <thead class="table-light">
                <tr>
                    <td>A</td>
                    <td>B</td>
                    <td>A || B</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $a = false;
                    $b = false;
                    ?>
                    <th><?php echo (int)$a; ?></th>
                    <th><?php echo (int)$b; ?></th>
                    <th><?php echo (int)($a || $b); ?></th>
                </tr>
                <tr>
                    <?php
                    $a = false;
                    $b = true;
                    ?>
                    <th><?php echo (int)$a; ?></th>
                    <th><?php echo (int)$b; ?></th>
                    <th><?php echo (int)($a || $b); ?></th>
                </tr>
                <tr>
                    <?php
                    $a = true;
                    $b = false;
                    ?>
                    <th><?php echo (int)$a; ?></th>
                    <th><?php echo (int)$b; ?></th>
                    <th><?php echo (int)($a || $b); ?></th>
                </tr>
                <tr>
                    <?php
                    $a = true;
                    $b = true;
                    ?>
                    <th><?php echo (int)$a; ?></th>
                    <th><?php echo (int)$b; ?></th>
                    <th><?php echo (int)($a || $b); ?></th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table caption-top">
            <caption>Tаблица истинности логического оператора xor</caption>
            <thead class="table-light">
                <tr>
                    <td>A</td>
                    <td>B</td>
                    <td>A xor B</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $a = false;
                    $b = false;
                    ?>
                    <th><?php echo (int)$a; ?></th>
                    <th><?php echo (int)$b; ?></th>
                    <th><?php echo (int)($a xor $b); ?></th>
                </tr>
                <tr>
                    <?php
                    $a = false;
                    $b = true;
                    ?>
                    <th><?php echo (int)$a; ?></th>
                    <th><?php echo (int)$b; ?></th>
                    <th><?php echo (int)($a xor $b); ?></th>
                </tr>
                <tr>
                    <?php
                    $a = true;
                    $b = false;
                    ?>
                    <th><?php echo (int)$a; ?></th>
                    <th><?php echo (int)$b; ?></th>
                    <th><?php echo (int)($a xor $b); ?></th>
                </tr>
                <tr>
                    <?php
                    $a = true;
                    $b = true;
                    ?>
                    <th><?php echo (int)$a; ?></th>
                    <th><?php echo (int)$b; ?></th>
                    <th><?php echo (int)($a xor $b); ?></th>
                </tr>
            </tbody>
        </table>
    </div>

    <h2>Задание 2. Решение квадратного уравнения.</h2>
    <!--     1 уравнения-->
    <?php
    $a = 3;
    $b = -4;
    $c = 2;
    $discriminant = calculationDiscriminant($a,$b,$c);
    ?>
    <p>Уравнение 1: <?php echo $a; ?>x<sup>2</sup> <?php echo $b; ?>x + <?php echo $c; ?> = 0.</p>
    <p>Ответ:
    <?php echo getTextByDiscriminant($discriminant)?>
    <?php echo getRootText($discriminant, $a, $b); ?></p>
<!--    конец 1 уравнения-->
<!--     2 уравнения-->
    <?php
    $a = 1;
    $b = -6;
    $c = 9;
    $discriminant = calculationDiscriminant($a,$b,$c);
    ?>
    <p>Уравнение 2: x<sup>2</sup> <?php echo $b; ?>x + <?php echo $c; ?> = 0.</p>
    <p>Ответ:
    <?php echo getTextByDiscriminant($discriminant)?>
    <?php echo getRootText($discriminant, $a, $b); ?></p>
<!--    конец 2 уравнения-->
<!--     3 уравнения-->
    <?php
    $a = 1;
    $b = -4;
    $c = -5;
    $discriminant = calculationDiscriminant($a,$b,$c);
    ?>
    <p>Уравнение 3: x<sup>2</sup> <?php echo $b; ?>x <?php echo $c; ?> = 0.</p>
    <p>Ответ:
    <?php echo getTextByDiscriminant($discriminant)?>
    <?php echo getRootText($discriminant, $a, $b); ?></p>
<!--    конец 3 уравнения-->

    <h2>Задание 3. Исследование на тему "Что возвращает оператор include, если его использовать как функцию."</h2>
    <p>Если include() без параметра, будет ошибка - Parse error: syntax error, unexpected token ")" in /file.php on line X.</p>
    <?php
//    include(); // Parse error: syntax error, unexpected token ")" in /Users/XXX/Sites/php-1/index.php on line 229
    ?>

    <p>Если include(__DIR__ . '/file-none.php') c параметром, где файл не существует, будет ошибка - Failed to open stream: No such file or directory in /file.php on line X. </p>
    <?php
    //        include(__DIR__ . '/file-none.php'); // Failed to open stream: No such file or directory in /Users/XXX/Sites/php-1/index.php on line 237
    ?>

    <p>Если include('file-include.php') c параметром, если файл существует он будет включен и выполнены инструкции в файле.
        Если путь не указан, используется путь, указанный в директиве include_path.
        Если файл не найден в include_path, include попытается проверить директорию, в которой находится текущий включающий скрипт и текущую рабочую директорию.</p>
    <p class="text-primary">
    <?php
        include('file-include.php');
    ?></p>

    <p>Если include(__DIR__ . '/file-include.php') c параметром, если файл существует он будет включен и выполнены инструкции в файле.</p>
    <p class="text-primary">
    <?php
        include(__DIR__ . '/file-include.php');
    ?></p>

    <p>Если include(__DIR__ . '/file-include-empty.php') c параметром и проверить что возвращает функция var_dump, то если файл существует он будет включен и
        выполнены инструкции в файле. И дополнительно увидим "int(1)".</p>
    <p class="text-primary">
    <?php
        var_dump(include(__DIR__ . '/file-include-empty.php'));
    ?></p>

    <h2>Задание 4. Угадываем пол по имени человека</h2>
    <?php
    $nameWomen = 'Марина';
    $nameMan = 'Максим';
    $nameMan2 = 'Василий';
    ?>
    <p><?= $nameWomen . " - " . getGenderByName($nameWomen)?></p>
    <p><?= $nameMan . " - " . getGenderByName($nameMan)?></p>
    <p><?= $nameMan2 . " - " . getGenderByName($nameMan2)?></p>
</body>
</html>