<?php

$string = "123";
function printStringReturnNumber($s)
{
    return (int) $s;
}

$my_num = printStringReturnNumber($string);
echo $my_num . "\n";

function increaseEnthusiasm($s)
{
    return $s . "!";
}

echo increaseEnthusiasm("some string") . "\n";

function repeatThreeTimes($s)
{
    return $s . $s . $s;
}

echo repeatThreeTimes("abc") . "\n";

echo increaseEnthusiasm(repeatThreeTimes("q1w2e3_")) . "\n";

function cut($s, $x = 10)
{
    return substr($s, 0, $x);
}

echo cut("qwerty", 2) . "\n";
echo cut("abcd efgh ijkl mnpq") . "\n";


