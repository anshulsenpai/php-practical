<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Even and Odd Numbers</title>
</head>
<body>

<?php

// Function to display even and odd numbers between 1 and 50
function EvenOdd() {
    echo "Even Numbers: ";
    for ($i = 2; $i <= 50; $i += 2) {
        echo $i . " ";
    }

    echo "<br>";

    echo "Odd Numbers: ";
    for ($i = 1; $i <= 50; $i += 2) {
        echo $i . " ";
    }
}

// Call the function to display even and odd numbers
EvenOdd();

?>

</body>
</html>
