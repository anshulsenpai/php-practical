<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marksheet Form</title>
</head>
<body>

<?php

// Initialize variables to store user information
$seatNumber = $subject1 = $subject2 = $subject3 = $subjectName1 = $subjectName2 = $subjectName3 = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user information from the form
    $seatNumber = $_POST["seatNumber"];
    $subject1 = $_POST["subject1"];
    $subject2 = $_POST["subject2"];
    $subject3 = $_POST["subject3"];
    $subjectName1 = $_POST["subjectName1"];
    $subjectName2 = $_POST["subjectName2"];
    $subjectName3 = $_POST["subjectName3"];

    // Display the marksheet in tabular format
    echo "<h2>Mark Sheet</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Seat Number</th><th>Subject</th><th>Marks</th></tr>";
    echo "<tr><td rowspan='3'>$seatNumber</td><td>$subjectName1</td><td>$subject1</td></tr>";
    echo "<tr><td>$subjectName2</td><td>$subject2</td></tr>";
    echo "<tr><td>$subjectName3</td><td>$subject3</td></tr>";
    echo "</table>";
}

?>

<!-- HTML form to accept marksheet information -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="seatNumber">Seat Number:</label>
    <input type="text" name="seatNumber" required><br>

    <label for="subjectName1">Subject 1 Name:</label>
    <input type="text" name="subjectName1" required><br>
    <label for="subject1">Subject 1 Marks:</label>
    <input type="number" name="subject1" required><br>

    <label for="subjectName2">Subject 2 Name:</label>
    <input type="text" name="subjectName2" required><br>
    <label for="subject2">Subject 2 Marks:</label>
    <input type="number" name="subject2" required><br>

    <label for="subjectName3">Subject 3 Name:</label>
    <input type="text" name="subjectName3" required><br>
    <label for="subject3">Subject 3 Marks:</label>
    <input type="number" name="subject3" required><br>

    <input type="submit" value="Generate Mark Sheet">
</form>

</body>
</html>
