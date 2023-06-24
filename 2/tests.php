<?php
$a = 3;
$b = -4;
$c = 2;
$d = -8;
// D < 0 корней нет
assert($d == calculationDiscriminant($a,$b,$c));
assert('' == getRootText($d, $a, $b));
$a = 1;
$b = -6;
$c = 9;
$d = 0;
// D == 0 один корень
assert($d == calculationDiscriminant($a,$b,$c));
assert('x = 3' == getRootText($d, $a, $b));
$a = 1;
$b = -4;
$c = -5;
$d = 36;
// D > 0 два корня
assert($d == calculationDiscriminant($a,$b,$c));
assert('x<sub>1</sub> = 5, x<sub>2</sub> = -1' == getRootText($d, $a, $b));


$textFemale = 'Женщина';
$textMale = 'Мужчина';
assert(null == getGenderByName(''));
assert($textFemale == getGenderByName('Марина'));
assert($textFemale == getGenderByName('Кристина'));
assert($textMale == getGenderByName('Максим'));
assert($textMale == getGenderByName('Артём'));