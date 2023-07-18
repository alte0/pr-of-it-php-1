<?php
$aTest = 3;
$bTest = -4;
$cTest = 2;
$dTest = -8;
assert($dTest == calculationDiscriminant($aTest, $bTest, $cTest));

$aTest = 1;
$bTest = -6;
$cTest = 9;
$dTest = 0;
assert($dTest == calculationDiscriminant($aTest, $bTest, $cTest));

$aTest = 1;
$bTest = -4;
$cTest = -5;
$dTest = 36;
assert($dTest == calculationDiscriminant($aTest, $bTest, $cTest));


assert(-1 == getGenderByName(''));
assert(0 == getGenderByName('Марина'));
assert(0 == getGenderByName('Кристина'));
assert(1 == getGenderByName('Максим'));
assert(1 == getGenderByName('Артём'));
assert(-1 == getGenderByName('Василий'));