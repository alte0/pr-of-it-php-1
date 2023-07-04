<?php

// Функции
require __DIR__ . '/functions.php';
// Тесты для функций
require __DIR__ . '/tests.php';

$arrTextDiscriminant = getArrTextByRoots();

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ДЗ 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="p-3">
<div class="container">
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
    $discriminant = calculationDiscriminant($a, $b, $c);
    ?>
    <p>Уравнение 1: <?php echo $a; ?>x<sup>2</sup> <?php echo $b; ?>x + <?php echo $c; ?> = 0.</p>
    <p>Ответ:
        <?php
        $countSqrt = getCountSqrt($discriminant);
        $x1 = $x2 = '';

        echo $arrTextDiscriminant[$countSqrt];

        if (1 === $countSqrt) {
            ?> x = <?php echo getSqrt($discriminant, $a, $b);
        } elseif (2 === $countSqrt) {
            ?> x<sub>1</sub> = <?php echo getSqrt($discriminant, $a, $b);
            ?> x<sub>2</sub> = <?php echo getSqrt($discriminant, $a, $b, '-');
        }
        ?></p>
    <!--    конец 1 уравнения-->
    <!--     2 уравнения-->
    <?php
    $a = 1;
    $b = -6;
    $c = 9;
    $discriminant = calculationDiscriminant($a, $b, $c);
    ?>
    <p>Уравнение 2: x<sup>2</sup> <?php echo $b; ?>x + <?php echo $c; ?> = 0.</p>
    <p>Ответ:
        <?php
        $countSqrt = getCountSqrt($discriminant);
        $x1 = $x2 = '';

        echo $arrTextDiscriminant[$countSqrt];

        if (1 === $countSqrt) {
            ?> x = <?php echo getSqrt($discriminant, $a, $b);
        } elseif (2 === $countSqrt) {
            ?> x<sub>1</sub> = <?php echo getSqrt($discriminant, $a, $b);
            ?> x<sub>2</sub> = <?php echo getSqrt($discriminant, $a, $b, '-');
        }
        ?></p>
    <!--    конец 2 уравнения-->
    <!--     3 уравнения-->
    <?php
    $a = 1;
    $b = -4;
    $c = -5;
    $discriminant = calculationDiscriminant($a, $b, $c);
    ?>
    <p>Уравнение 3: x<sup>2</sup> <?php echo $b; ?>x <?php echo $c; ?> = 0.</p>
    <p>Ответ:
        <?php
        $countSqrt = getCountSqrt($discriminant);
        $x1 = $x2 = '';

        echo $arrTextDiscriminant[$countSqrt];

        if (1 === $countSqrt) {
            ?> x = <?php echo getSqrt($discriminant, $a, $b);
        } elseif (2 === $countSqrt) {
            ?> x<sub>1</sub> = <?php echo getSqrt($discriminant, $a, $b);
            ?> x<sub>2</sub> = <?php echo getSqrt($discriminant, $a, $b, '-');
        }
        ?></p>
    <!--    конец 3 уравнения-->

    <h2>Задание 3. Исследование на тему "Что возвращает оператор include, если его использовать как функцию."</h2>
    <p>Если оператор include вызвать как функцию, то работать это будет так же, как и без скобок. Так как круглые скобки
        не обязательны вокруг аргумента у специальной языковая конструкция. Но нужно буть внимательным при сравнении
        возвращаемого значения. </p>
    <p>Вызов include без параметров, то будет ошибка - Parse error: syntax error, unexpected token ")" in
        /Users/XXX/Sites/pr-of-it-php-1/2/index.php on line 251
        и выполнение инструкций в файле прервётся и покажется только ошибка.</p>
    <?php
    //        include(); // Parse error: syntax error, unexpected token ")" in /Users/XXX/Sites/pr-of-it-php-1/2/index.php on line 251
    ?>
    <p>Вызов include с пустой строкой, то будет ошибка - Fatal error: Uncaught ValueError: Path cannot be empty in
        /Users/XXX/Sites/pr-of-it-php-1/2/index.php:256 Stack trace: #0 {main} thrown in
        /Users/XXX/Sites/pr-of-it-php-1/2/index.php on line 256
        и выполнение инструкций в файле прервётся после текущей строки вызова функции.</p>
    <?php
    //        include(''); // Fatal error: Uncaught ValueError: Path cannot be empty in /Users/XXX/Sites/pr-of-it-php-1/2/index.php:256 Stack trace: #0 {main} thrown in /Users/XXX/Sites/pr-of-it-php-1/2/index.php on line 256
    ?>

    <p>Вызов include c параметром __DIR__ . '/file-none.php' , где файл не существует, будет ошибка - Warning:
        include(/Users/XXX/Sites/pr-of-it-php-1/2/file-none.php): Failed to open stream: No such file or directory in
        /Users/XXX/Sites/pr-of-it-php-1/2/index.php on line 262
        и выполнение инструкций в файле продолжится.</p>
    <?php
    include(__DIR__ . '/file-none.php'); // Warning: include(/Users/XXX/Sites/pr-of-it-php-1/2/file-none.php): Failed to open stream: No such file or directory in /Users/XXX/Sites/pr-of-it-php-1/2/index.php on line 262
    ?>

    <p>Вызов include c параметром 'file-include.php', если файл существует он будет включен и выполнены инструкции в
        файле.
        Если путь не указан, используется путь, указанный в директиве include_path.
        Если файл не найден в include_path, include попытается проверить директорию, в которой находится текущий
        включающий скрипт и текущую рабочую директорию.</p>
    <p class="text-primary">
        <?php
        include('file-include.php');
        ?></p>

    <p>Вызов include c параметром __DIR__ . '/file-include.php', если файл существует он будет включен и выполнены
        инструкции в файле.</p>
    <p class="text-primary">
        <?php
        include(__DIR__ . '/file-include.php');
        ?></p>

    <p>Вызов include c параметром __DIR__ . '/file-include-empty.php' и проверить что возвращает функция var_dump, то
        если файл существует он будет включен и выполнены инструкции в файле. И дополнительно увидим "int(1)".</p>
    <p class="text-primary">
        <?php
        var_dump(include(__DIR__ . '/file-include-empty.php'));
        ?></p>

    <p>Если во включаемом файле с помощью оператора return возвращать данные, то их можно присвоить указанной
        переменной.</p>

    <h2>Задание 4. Угадываем пол по имени человека</h2>
    <?php
    $arGenders = ['Женщина','Мужчина'];
    $nameWomen = 'Марина';
    $nameMan = 'Максим';
    $nameMan2 = 'Василий';
    ?>
    <p><?php
        $genderId = getGenderByName($nameWomen);
        if ($genderId >= 0) {
            echo $nameWomen . " - " . $arGenders[$genderId];
        } else {
            echo $nameMan2 . " - неизвестно" ;
        }
        ?></p>
    <p><?php
        $genderId = getGenderByName($nameMan);
        if ($genderId >= 0){
            echo $nameMan . " - " . $arGenders[$genderId];
        } else {
            echo $nameMan2 . " - неизвестно" ;
        }
        ?></p>
    <p><?php
        $genderId = getGenderByName($nameMan2);
        if ($genderId >= 0) {
            echo $nameMan2 . " - " . $arGenders[$genderId];
        } else {
            echo $nameMan2 . " - неизвестно" ;
        }
        ?></p>
</div>
</body>
</html>