<?php

$n = 10;

//#1
function arrayFill_1(&$array, $howMuch)
{
    for ($i = 0; $i < $howMuch; $i++)
    {
        $array[$i] = "x";
        for ($j = 0; $j < $i; $j++)
        {
            $array[$i] .= "x";
        }
    }
}

arrayFill_1($arr1, $n);
for ($i = 0; $i < $n; $i++)
    echo $arr1[$i] . " ";
echo "\n";

//#2
function arrayFill($char, $howMuch)
{
    for ($i = 0; $i < $howMuch; $i++)
    {
        $array[$i] = $char;
    }
    return $array;
}

$arr2 = arrayFill("abc", $n);
for ($i = 0; $i < $n; $i++)
    echo $arr2[$i] . " ";
echo "\n";

//#3
$arr3 = [[1,2,3], [4,5], [6,3,2,4,-100], [0]];
$sum = 0;
foreach($arr3 as $i)
    foreach($i as $j)
        $sum += $j;

echo $sum ."\n";

//#4
for($i = 0; $i < 3; $i++)
    for($j = 0; $j < 3; $j++)
        $arr4[$i][$j] = $i*3 + $j+1;

for($i = 0; $i < 3; $i++)
{
    for($j = 0; $j < 3; $j++)
        echo $arr4[$i][$j] . " ";
    echo "\n";
}

//#5
$arr5 = [2, 5, 3, 9];
$result = $arr5[0]*$arr5[1] + $arr5[2]*$arr5[3];
echo $result ."\n";

//#6
$user = ["name" => "Ivan", "surname" => "Ivanov", "patronymic" => "Ivanovich"];
echo $user["surname"] . " " . $user["name"] . " " . $user["patronymic"] ."\n";

//#7
$date = ["year" => date("Y"), "month" => date("m"), "day" => date("d")];
echo $date["year"] ."-". $date["month"] ."-". $date["day"] ."\n";

//#8
$arr8 = ['a', 'b', 'c', 'd', 'e'];
echo count($arr8) ."\n";

//#9
echo $arr8[count($arr8)-1] ."\n";
echo $arr8[count($arr8)-2] ."\n";
