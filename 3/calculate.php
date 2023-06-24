<?php
$result = null;
$signs = ['+', '-', '*', '/'];

if (
    isset($_GET["NUM_1"]) && is_numeric($_GET["NUM_1"]) &&
    isset($_GET["NUM_2"]) && is_numeric($_GET["NUM_2"]) &&
    isset($_GET["SIGN_VALUE"]) && in_array($_GET["SIGN_VALUE"], $signs)
){
    $num_1 = intval($_GET["NUM_1"]);
    $num_2 = intval($_GET["NUM_2"]);

    switch ($_GET["SIGN_VALUE"]){
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