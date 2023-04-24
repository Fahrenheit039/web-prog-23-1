<?php

// a??b
$str1 = 'ahb acb aeb aeeb adcb axeb abcd abcbd';

$strArr = explode(" ", $str1);
$regexp = "/a..b/i";
foreach($strArr as $item) {
    $match = [];
    if (preg_match($regexp, $item, $match)) {
        echo $match[0] ."\n";
    }
}

// digits^3
$str2 = '20a3bb22ccc333dddd4444q5w6e7';

$regexp = "/[a-z]*[0-9]*/i";
$matches = null;
preg_match_all($regexp, $str2,$matches, $flags = PREG_SET_ORDER, $offset = 0);
//print_r($matches);

$answer = "";

$regexp = "/[a-z]*/i";
foreach ($matches as $item => $value) {
//    echo "> item = ". $item ." \ value = ". "{$value}"."\n";
    foreach ($value as $i => $v) {
        if ($v === "") break;

//        echo "i = ". $i ." \ v = ". $v ."\n";

        $number = 0;
        $word = "";
//        $regexp1 = "/[a-z]/i";
        if (ctype_digit($v)) {
//            echo "only digits" ."\n";
            $digits = preg_split($regexp, $v);
            for ($j = 1; $j < count($digits)-1; $j++)
                $number = $number*10 + $digits[$j];
//            print_r($digits);
            $number = pow($number, 3);
        } else {
            $letters = preg_split("/[0-9]*/i", $v);
            for ($j = 1; $j < count($letters) - 2; $j++)
                $word = $word . $letters[$j];
//            print_r($letters);

            $digits = preg_split($regexp, $v);
            for ($j = 2; $j < count($digits) - 1; $j++)
                $number = $number * 10 + $digits[$j];
//            print_r($digits);
            $number = pow($number, 3);
        }

        $answer = $answer . $word . "{$number}";
    }

}

print("\n".$answer);




