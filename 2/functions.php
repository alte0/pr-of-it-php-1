<?php
function calculationDiscriminant($a, $b, $c)
{
    return $b * $b - 4 * $a * $c;
}

function getGenderByName($name)
{
    $genderId = -1;

    if (empty($name)) {
        return $genderId;
    }

    $nameFemale1 = 'Марина';
    $nameFemale2 = 'Кристина';
    $nameMale1 = 'Максим';
    $nameMale2 = 'Артём';

    if ((stripos($nameFemale1, $name) !== false) || (stripos($nameFemale2, $name) !== false)) {
        $genderId = 0;
    } elseif ((stripos($nameMale1, $name) !== false) || (stripos($nameMale2, $name) !== false)) {
        $genderId = 1;
    }

    return $genderId;
}