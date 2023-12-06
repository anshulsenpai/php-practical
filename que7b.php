<?php

// Function to sort an associative array in ascending order based on keys
function sortAssociativeArrayAscending(&$arr) {
    ksort($arr);
}

// Function to sort an associative array in descending order based on keys
function sortAssociativeArrayDescending(&$arr) {
    krsort($arr);
}

// Sample associative array
$sampleArray = array(
    'b' => 20,
    'a' => 10,
    'c' => 30,
    'd' => 5
);

// Display the original associative array
echo "Original Associative Array: ";
print_r($sampleArray);

// Sort the array in ascending order
sortAssociativeArrayAscending($sampleArray);
echo "<br>Associative Array Sorted in Ascending Order: ";
print_r($sampleArray);

// Sort the array in descending order
sortAssociativeArrayDescending($sampleArray);
echo "<br>Associative Array Sorted in Descending Order: ";
print_r($sampleArray);

?>