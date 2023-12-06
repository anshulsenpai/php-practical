<?php

// Function to perform Bubble Sort on an array
function bubbleSort(&$arr) {
    $n = count($arr);

    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            // Swap if the element found is greater than the next element
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
}

// Sample array to be sorted
$numbers = array(64, 34, 25, 12, 22, 11, 90);

// Call the Bubble Sort function
bubbleSort($numbers);

// Display the sorted array
echo "Sorted Array: ";
foreach ($numbers as $value) {
    echo "$value ";
}

?>