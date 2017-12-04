<?php

if($argc != 3) {
    echo "Please supply the input file and part as an argument";
    exit(1);
}

$f = new SplFileObject($argv[1]);
$mode = $argv[2];
$points = 0;

while(!$f->eof()) {
    $l = $f->fgetcsv(" ");
    switch ($mode) {
        case 1:
            if(count($l) == count(array_unique($l))) {
                $points++;
            }
            break;

        case 2:
            if(count($l) != count(array_unique($l))) {
                break;
            }

            $lineData = [];
            foreach($l as $word) {
                $wordData = count_chars($word);
                if(in_array($wordData, $lineData)) {
                    break 2;
                }else{
                    $lineData[] = $wordData;
                }
            }

            $points++;
            break;
    }

}

echo "Done, " . $points;