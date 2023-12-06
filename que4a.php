<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate x^y</title>
</head>
<body>

<?php

// User-defined function to calculate x^y
function calculatePower($x, $y) {
    return pow($x, $y);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs for x and y
    $x = $_POST["base"];
    $y = $_POST["exponent"];

    // Validate inputs (you may want to add more validation as needed)
    if (!is_numeric($x) || !is_numeric($y)) {
        echo "Please enter valid numeric values for x and y.<br>";
    } else {
        // Calculate and display the result
        $result = calculatePower($x, $y);
        echo "Result: $x^$y = $result<br>";
    }
}

?>

<!-- HTML form to accept user inputs -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="base">Enter the base (x):</label>
    <input type="text" name="base" required><br>

    <label for="exponent">Enter the exponent (y):</label>
    <input type="text" name="exponent" required><br>

    <input type="submit" value="Calculate">
</form>

</body>
</html>
