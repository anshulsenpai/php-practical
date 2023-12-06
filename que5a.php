<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type Casting Demonstration</title>
</head>
<body>

<?php

// Type casting from integer to float
$integerNumber = 42;
$floatNumber = (float)$integerNumber;
echo "Integer to Float: $integerNumber (integer) => $floatNumber (float)<br>";

// Type casting from float to integer
$floatNumber = 3.14;
$integerNumber = (int)$floatNumber;
echo "Float to Integer: $floatNumber (float) => $integerNumber (integer)<br>";

// Type casting from integer to string
$integerValue = 123;
$stringValue = (string)$integerValue;
echo "Integer to String: $integerValue (integer) => $stringValue (string)<br>";

// Type casting from float to string
$floatValue = 5.67;
$stringValue = (string)$floatValue;
echo "Float to String: $floatValue (float) => $stringValue (string)<br>";

// Type casting from string to integer
$stringValue = "456";
$integerValue = (int)$stringValue;
echo "String to Integer: $stringValue (string) => $integerValue (integer)<br>";

// Type casting from string to float
$stringValue = "7.89";
$floatValue = (float)$stringValue;
echo "String to Float: $stringValue (string) => $floatValue (float)<br>";

?>

</body>
</html>
