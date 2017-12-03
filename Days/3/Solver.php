<?php

if($argc != 2) {
    echo "Please supply the input as an argument";
    exit(1);
}

$number = (int)$argv[1];
$ring = 0; // Position of '1'
$currentSize = 1;
$ringSize = 0;

while($currentSize < $number) {
    $ring++;
    $ringSize = $ring * 2 * 4;
    $currentSize += $ringSize;
}

$steps = $ring;
$currentSize -= $ringSize;
$ringSize /= 4;

while($steps == $ring) {
    if($number - $currentSize > $ringSize) {
        $currentSize += $ringSize;
        continue;
    }

    $min = $currentSize;
    $max = $currentSize + $ringSize - 1;
    $center = ceil(($max + $min)/2);

    $delta = abs($number - $center);
    $steps += $delta;
}

print "Steps: " . $steps;

