<?php

$signs = require __DIR__ . '/signs.php';

if (
    isset($_GET["num_1"]) && is_numeric($_GET["num_1"]) &&
    isset($_GET["num_2"]) && is_numeric($_GET["num_2"]) &&
    isset($_GET["sign_value"]) && is_array($signs) && in_array($_GET["sign_value"], $signs)
) {
    $num_1 = intval($_GET["num_1"]);
    $num_2 = intval($_GET["num_2"]);

    switch ($_GET["sign_value"]) {
        case '+':
            $result = $num_1 + $num_2;
            break;
        case '-':
            $result = $num_1 - $num_2;
            break;
        case '*':
            $result = $num_1 * $num_2;
            break;
        case '/':
            if ($num_2 !== 0) {
                $result = $num_1 / $num_2;
            } else {
                $result = 'Делить на 0 нельзя';
            }
            break;
    }
}