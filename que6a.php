<?php

// Function to display the pattern
function displayPattern($n) {
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "* ";
        }
        echo "<br>";
    }
}

// Input value for 'n'
$n = 3;

// Display the pattern for the given input
displayPattern($n);

?>