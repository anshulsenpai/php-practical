<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accept and Print Values</title>
</head>
<body>

<?php

// Initialize an empty array to store the values
$values = array();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Loop through each input field and store the values in the array
    for ($i = 1; $i <= 5; $i++) {
        $inputName = "value" . $i;
        $values[$i - 1] = $_POST[$inputName];
    }

    // Print the values
    echo "<p>Entered Values:</p>";
    echo "<ul>";
    foreach ($values as $value) {
        echo "<li>$value</li>";
    }
    echo "</ul>";
}

?>

<!-- HTML form to accept five values -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="value1">Value 1:</label>
    <input type="text" name="value1" required><br>

    <label for="value2">Value 2:</label>
    <input type="text" name="value2" required><br>

    <label for="value3">Value 3:</label>
    <input type="text" name="value3" required><br>

    <label for="value4">Value 4:</label>
    <input type="text" name="value4" required><br>

    <label for="value5">Value 5:</label>
    <input type="text" name="value5" required><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
