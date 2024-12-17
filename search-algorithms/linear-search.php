<?php
function linearSearch($arr, $target) {
    foreach ($arr as $index => $value) {
        if ($value === $target) {
            return $index; 
        }
    }
    return -1;
}

// Example

$arr = [1, 3, 5, 7, 9, 11, 13, 15];
$target = 7;
$result = linearSearch($arr, $target);
echo $result;
?>
