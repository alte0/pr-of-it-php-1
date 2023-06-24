<?php

function calculationDiscriminant($a, $b, $c){
    return $b * $b - 4 * $a * $c;
}

function getTextByDiscriminant($discriminant){
    if ($discriminant < 0){
        return 'D < 0, корней нет.';
    } elseif ($discriminant == 0){
        return 'D = 0, уравнение имеет один корень.';
    } elseif ($discriminant > 0){
        return 'D > 0, уравнение имеет два корня.';
    }
}

function getRootNumber($discriminant, $a, $b, $sign){
    if ($sign === '-'){
        return (- $b - sqrt($discriminant)) / 2 * $a;
    } else{
        return (- $b + sqrt($discriminant)) / 2 * $a;
    }
}

function getRootText($discriminant, $a, $b){
    $returnTextRoot = '';

    if ($discriminant === 0){
        $returnTextRoot .= 'x = ' . getRootNumber($discriminant, $a, $b, '+');
    } elseif ($discriminant > 0){
        $returnTextRoot .= 'x<sub>1</sub> = ' . getRootNumber($discriminant, $a, $b, '+');
        $returnTextRoot .=  ', ';
        $returnTextRoot .=  'x<sub>2</sub> = ' . getRootNumber($discriminant, $a, $b, '-');
    }

    return $returnTextRoot;
}

function getGenderByName($name){
    $gender = null;

    if (empty($name)){
        return $gender;
    }

    $textFemale = 'Женщина';
    $textMale = 'Мужчина';
    
    $nameFemale1 = 'Марина';
    $nameFemale2 = 'Кристина';
    $nameMale1 = 'Максим';
    $nameMale2 = 'Артём';

    if ((stripos($nameFemale1, $name) !== false) || (stripos($nameFemale2, $name) !== false)){
        $gender = $textFemale;
    }
    elseif ((stripos($nameMale1, $name) !== false) || (stripos($nameMale2, $name) !== false)){
        $gender = $textMale;
    }

    return $gender;
}