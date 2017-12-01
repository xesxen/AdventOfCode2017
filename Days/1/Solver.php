<?php

if($argc != 2) {
    echo "Please supply the input as an argument";
    exit(1);
}

$input = $argv[1];
$length = strlen($input);
$points = 0;

if(!preg_match('/^[\d]+$/', $input)) {
    echo "Invalid input";
    exit;
}

$input = str_split($input);
$input[] = $input[0]; // Cyclic list

foreach($input as $idx => $val) {
       if($idx < $length && $input[$idx + 1] == $val) {
           $points += intval($val);
       }
}

echo "Done, " . $points;