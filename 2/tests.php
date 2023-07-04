<?php
$aTest = 3;
$bTest = -4;
$cTest = 2;
$dTest = -8;
// D < 0 корней нет
$discriminantTest = calculationDiscriminant($aTest, $bTest, $cTest);
assert($dTest == $discriminantTest);
$countSqrtTest = getCountSqrt($discriminantTest);
assert(0 == $countSqrtTest);
assert(null == getSqrt($discriminantTest, $aTest, $bTest));

$aTest = 1;
$bTest = -6;
$cTest = 9;
$dTest = 0;
// D == 0 один корень
$discriminantTest = calculationDiscriminant($aTest, $bTest, $cTest);
assert($dTest == $discriminantTest);
$countSqrtTest = getCountSqrt($discriminantTest);
assert(1 == $countSqrtTest);
assert(3 == getSqrt($discriminantTest, $aTest, $bTest));

$aTest = 1;
$bTest = -4;
$cTest = -5;
$dTest = 36;
// D > 0 два корня
$discriminantTest = calculationDiscriminant($aTest, $bTest, $cTest);
assert($dTest == $discriminantTest);
$countSqrtTest = getCountSqrt($discriminantTest);
assert(2 == $countSqrtTest);
assert(5 == getSqrt($discriminantTest, $aTest, $bTest));
assert(-1 == getSqrt($discriminantTest, $aTest, $bTest, '-'));



assert(-1 == getGenderByName(''));
assert(0 == getGenderByName('Марина'));
assert(0 == getGenderByName('Кристина'));
assert(1 == getGenderByName('Максим'));
assert(1 == getGenderByName('Артём'));
assert(-1 == getGenderByName('Василий'));