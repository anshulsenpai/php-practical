<?php
// Start the session
session_start();

// Function to calculate total and percentage
function calculateResult($marks) {
    $totalMarks = array_sum($marks);
    $percentage = ($totalMarks / 500) * 100;

    return array($totalMarks, $percentage);
}

// Check if the student information form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitInfo"])) {
    // Retrieve student information from the form and store in session
    $_SESSION["studentInfo"] = array(
        "name" => $_POST["name"],
        "class" => $_POST["class"],
        "address" => $_POST["address"]
    );

    // Redirect to the marks form
    header("Location: marksheet.php");
    exit();
}

// Check if the mark sheet form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitMarks"])) {
    // Retrieve marks from the form and store in session
    $_SESSION["studentMarks"] = array(
        "phy" => $_POST["phy"],
        "bio" => $_POST["bio"],
        "chem" => $_POST["chem"],
        "maths" => $_POST["maths"],
        "marathi" => $_POST["marathi"],
        "english" => $_POST["english"]
    );

    // Calculate total and percentage
    list($totalMarks, $percentage) = calculateResult($_SESSION["studentMarks"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
</head>
<body>

<?php
// Display student information form
if (!isset($_SESSION["studentInfo"])) {
    ?>
    <h2>Student Information Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="class">Class:</label>
        <input type="text" name="class" required><br>

        <label for="address">Address:</label>
        <textarea name="address" rows="4" required></textarea><br>

        <input type="submit" name="submitInfo" value="Submit">
    </form>
    <?php
} else {
    // Display mark sheet form
    ?>
    <h2>Mark Sheet</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p><strong>Name:</strong> <?php echo $_SESSION["studentInfo"]["name"]; ?></p>
        <p><strong>Class:</strong> <?php echo $_SESSION["studentInfo"]["class"]; ?></p>
        <p><strong>Address:</strong> <?php echo $_SESSION["studentInfo"]["address"]; ?></p>

        <label for="phy">Physics:</label>
        <input type="number" name="phy" required><br>

        <label for="bio">Biology:</label>
        <input type="number" name="bio" required><br>

        <label for="chem">Chemistry:</label>
        <input type="number" name="chem" required><br>

        <label for="maths">Mathematics:</label>
        <input type="number" name="maths" required><br>

        <label for="marathi">Marathi:</label>
        <input type="number" name="marathi" required><br>

        <label for="english">English:</label>
        <input type="number" name="english" required><br>

        <input type="submit" name="submitMarks" value="Generate Mark Sheet">
    </form>
    <?php
}

// Display mark sheet
if (isset($totalMarks) && isset($percentage)) {
    echo "<h2>Mark Sheet</h2>";
    echo "<p><strong>Name:</strong> {$_SESSION["studentInfo"]["name"]}</p>";
    echo "<p><strong>Class:</strong> {$_SESSION["studentInfo"]["class"]}</p>";
    echo "<p><strong>Address:</strong> {$_SESSION["studentInfo"]["address"]}</p>";
    echo "<p><strong>Physics:</strong> {$_SESSION["studentMarks"]["phy"]}</p>";
    echo "<p><strong>Biology:</strong> {$_SESSION["studentMarks"]["bio"]}</p>";
    echo "<p><strong>Chemistry:</strong> {$_SESSION["studentMarks"]["chem"]}</p>";
    echo "<p><strong>Mathematics:</strong> {$_SESSION["studentMarks"]["maths"]}</p>";
    echo "<p><strong>Marathi:</strong> {$_SESSION["studentMarks"]["marathi"]}</p>";
    echo "<p><strong>English:</strong> {$_SESSION["studentMarks"]["english"]}</p>";
    echo "<p><strong>Total Marks:</strong> $totalMarks</p>";
    echo "<p><strong>Percentage:</strong> $percentage%</p>";
}

?>

</body>
</html>
