<?php

//#1
function f1($number_1, $number_2)
{
    if (($number_1 + $number_2) > 10)
        return true;
    else return false;
}
echo f1(13,-2) ."\n";

//#2
function equal($number_1, $number_2)
{
    if ($number_1 === $number_2)
        return true;
    else return false;
}
echo equal(5,5) ."\n";

//#3
$test = 0;
echo ($test <> 0) ?:'верно';
echo "\n";

//#4
$age = 81;
if (($age < 10) || ($age > 99))
    echo "age <10 or >99" ."\n";
else
{
    $sum_digits = ($age % 10) + floor($age / 10);
    if ($sum_digits <= 9)
        echo "sum of digits is single" ."\n";
    else echo "sum of digits is two-digit" ."\n";
}

//#5
$arr = [1,2,3];
if (count($arr) == 3)
{
    $sum_arr = 0;
    foreach($arr as $i)
        $sum_arr += $i;
    echo $sum_arr ."\n";
}


