<?php

if($argc != 3) {
    echo "Please supply the input file and part as an argument";
    exit(1);
}

$f = new SplFileObject($argv[1]);
$points = 0;

while(!$f->eof()) {
    $l = $f->fgetcsv("\t");
    switch($argv[2]) {
        case 1:
            $points += max($l) - min($l);
            break;

        case 2:
            $sorted = $l;
            sort($sorted);
            $point = 0;

            foreach($sorted as $min_number) {
                $matches = array_filter($l,
                    function($input) use ($min_number) {
                        return $input != $min_number && $input % $min_number == 0;
                    }
                );
                if($matches) {
                    $points += current($matches) / $min_number;
                    break 1;
                }
            }
            break;
    }
}

echo "Points: " . $points . PHP_EOL;