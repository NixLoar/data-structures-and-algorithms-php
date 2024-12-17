<?php
function jumpSearch($arr, $target) {
    $n = count($arr);
    $step = floor(sqrt($n)); 
    $prev = 0;
    $current = 0;

    while ($arr[min($step, $n) - 1] < $target) {
        $prev = $step;
        $current += $step;
        if ($prev >= $n) return -1; 
    }

    for ($i = $prev; $i < min($current, $n); $i++) {
        if ($arr[$i] === $target) {
            return $i; 
        }
    }

    return -1; 
}

// Example

$arr = [1, 3, 5, 7, 9, 11, 13, 15];
$target = 7;
$result = jumpSearch($arr, $target);
echo $result;
?>
