<?php

//#1
$array = [1,2,3,4,5,6,7,8,9,10];

$i = 0; //iterator
$sum_arr = 0;
function average($array)
{
    global $i;
    global $sum_arr;
    if ($i >= count($array))
        return;
    $sum_arr += $array[$i++];
    return average($array);
}

average($array);
echo $sum_arr / count($array) ."\n";

//#2
$n = 100;
$i = 1; //iterator
$sum_arr = 0;
function sum_from_1_to_100()
{
    global $n;
    global $i;
    global $sum_arr;
    if ($i > $n)
        return;
    $sum_arr += $i++;
    return sum_from_1_to_100();
}

sum_from_1_to_100();
echo $sum_arr ."\n";

//#3
$arr1 = [1,2,3,4,5,6,7,8,9,10];
$i = 0; //iterator
function pow_arr()
{
    global $arr1;
    global $i;
    if ($i >= count($arr1))
        return;
    $arr1[$i] *= $arr1[$i];
    $i++;
    return pow_arr();
}

pow_arr($arr1);
foreach ($arr1 as $i)
    echo $i ." ";
echo "\n";

//#4
$i = 1; //iterator
$arr2 = array_fill_keys( range('a', 'z'), 1 );
//print_r($arr2);
//echo count($arr2) ."\n";
//echo $arr2[chr($i+97)] ."\n";
//echo chr(48) ."\n"; // for digits 48 = '0'
//echo chr(97) ."\n"; // for letters 97 = 'a'
//exit();
function key_arr()
{
    global $arr2;
    global $i;
    if ($i >= count($arr2))
        return;
    //echo $arr2[chr($i+97)] ." \ ". chr($i+97) ."\n";
    $arr2[chr($i+97)] = $i+1;
    $i++;
    return key_arr();
}

key_arr();
print_r($arr2);

//#5
$string = "1234567890";
$i = 0; //iterator
$length = strlen($string);
$sum_str = 0;
echo $length ."\n";
function str_cutting()
{
    global $string;
    global $i;
    global $length;
    global $sum_str;

    if ($i >= $length)
        return;
    if (abs($i - $length) > 1)
        $sum_str += (int) substr($string, $i, 2);
    else
        $sum_str += (int) substr($string, $i, 1);
    $i += 2;
    return str_cutting();
}

str_cutting();
echo $sum_str ."\n";



