<?php

echo rand(1, 100) . "\n";

for($i = 0; $i < 10; $i++)
    $array[$i] = rand();

for($i = 0; $i < 10; $i++)
    echo $array[$i] . " ";
