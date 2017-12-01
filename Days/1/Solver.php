<?php

if($argc != 3) {
    echo "Please supply the input and part as an argument";
    exit(1);
}

$input = $argv[1];
$mode = $argv[2];
$length = strlen($input);
$points = 0;

if(!preg_match('/^[\d]+$/', $input)) {
    echo "Invalid input";
    exit;
}

$input = str_split($input);

switch($mode) {
    case 1:
        foreach($input as $idx => $val) {
            $next_idx = ($idx + 1) % $length;
            if($idx < $length && $input[$next_idx] == $val) {
                $points += intval($val);
            }
        }

        break;
    case 2:
        foreach($input as $idx => $val) {
            $next_idx = ($idx + $length / 2) % $length;
            if($idx < $length && $input[$next_idx] == $val) {
                $points += intval($val);
            }
        }
        break;
}


echo "Done, " . $points;