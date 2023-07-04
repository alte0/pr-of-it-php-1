<?php
function calculationDiscriminant($a, $b, $c)
{
    return $b * $b - 4 * $a * $c;
}

function getArrTextByRoots()
{
    return [
        'D < 0, корней нет.', 'D = 0, уравнение имеет один корень.', 'D > 0, уравнение имеет два корня.'
    ];
}

function getCountSqrt($discriminant)
{
    if ($discriminant == 0) {
        // 'D = 0, уравнение имеет один корень.'
        return 1;
    } elseif ($discriminant > 0) {
        // 'D > 0, уравнение имеет два корня.'
        return 2;
    }

    // 'D < 0, корней нет.'
    return 0;
}

function getSqrt($discriminant, $a, $b, $sign = '')
{
    $countSqrt = getCountSqrt($discriminant);
    $result = null;

    switch ($countSqrt) {
        case 1:
            $result = (-$b + sqrt($discriminant)) / 2 * $a;
            break;
        case 2:
            if ('-' === $sign) {
                $result = (-$b - sqrt($discriminant)) / 2 * $a;
            } else {
                $result = (-$b + sqrt($discriminant)) / 2 * $a;
            }
            break;
    }

    return $result;
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