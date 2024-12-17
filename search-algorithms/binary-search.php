<?php
function binarySearch($arr, $target) {
    $left = 0;
    $right = count($arr) - 1;

    while ($left <= $right) {
        $middle = floor(($left + $right) / 2);
        $guess = $arr[$middle];

        if ($guess === $target) {
            return $middle;
        }
        if ($guess > $target) {
            $right = $middle - 1; 
        } else {
            $left = $middle + 1; 
        }
    }
    return -1; 
}

// Example

$arr = [1, 3, 5, 7, 9, 11, 13, 15];
$target = 7;
$result = binarySearch($arr, $target);
echo $result; 
?>