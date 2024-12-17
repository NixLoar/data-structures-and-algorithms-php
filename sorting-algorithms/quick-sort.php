<?php
function quickSort($arr) {
    if (count($arr) <= 1) return $arr;

    $pivot = $arr[count($arr) - 1];
    $left = [];
    $right = [];

    for ($i = 0; $i < count($arr) - 1; $i++) {
        if ($arr[$i] < $pivot) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }

    return array_merge(quickSort($left), [$pivot], quickSort($right));
}

// Example

$arr = [97, 4, 52, 90, 84, 44, 45, 13];
print_r(quickSort($arr));
?>
