<?php

$array = array(1,2,3,4,5,6,7,8,9);

$i = 0; //iterator
function f($array)
{
    global $i;
    if ($i >= count($array))
        return;
    echo $array[$i++] . " ";
    return f($array);
}

f($array);
