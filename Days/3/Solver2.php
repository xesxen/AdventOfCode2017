<?php

const UP = 0;
const LEFT = 1;
const DOWN = 2;
const RIGHT = 3;

if($argc != 2) {
    echo "Please supply the input as an argument";
    exit(1);
}

$data = [];
$ring = 1;
$direction = LEFT;
$x = 1;
$y = 1;
$data[0][0] = 1;
$data[1][0] = 1; // Our start position
$data[1][1] = 2;
$current = 1;
$target = $argv[1];

while($current < $target) {
    switch ($direction) {
        case UP:
            $y++;

            $pts = @$data[$x][$y-1];
            $pts += $data[$x-1][$y-1];
            $pts += $data[$x-1][$y];
            $pts += @$data[$x-1][$y+1];
            $data[$x][$y] = $pts;

            if($y == $ring) {
                $direction = LEFT;
            }
            break;

        case LEFT:
            $x--;

            $pts = @$data[$x][$y-1];
            $pts += $data[$x+1][$y-1];
            $pts += $data[$x+1][$y];
            $pts += @$data[$x-1][$y-1];
            $data[$x][$y] = $pts;

            if($x == -$ring) {
                $direction = DOWN;
            }
            break;

        case DOWN:
            $y--;

            $pts = @$data[$x][$y+1];
            $pts += $data[$x+1][$y+1];
            $pts += $data[$x+1][$y];
            $pts += @$data[$x+1][$y-1];
            $data[$x][$y] = $pts;

            if($y == -$ring) {
                $direction = RIGHT;
            }
            break;

        case RIGHT:
            $x++;

            $pts = @$data[$x][$y+1];
            $pts += $data[$x-1][$y+1];
            $pts += $data[$x-1][$y];
            $pts += @$data[$x+1][$y+1];
            $data[$x][$y] = $pts;

            if($x == $ring) {
                $direction = UP;
                $y--;
                $x++;
                $ring++;
            }
            break;


    }
    $current = $pts;
}

print "Found! " . $current;