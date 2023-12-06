<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information Form</title>
</head>
<body>

<?php

// Initialize variables to store user information
$name = $email = $gender = $dob = $address = $city = $country = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user information from the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $country = $_POST["country"];

    // Display the entered information
    echo "<h2>Entered Personal Information:</h2>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
    echo "<p><strong>Date of Birth:</strong> $dob</p>";
    echo "<p><strong>Address:</strong> $address</p>";
    echo "<p><strong>City:</strong> $city</p>";
    echo "<p><strong>Country:</strong> $country</p>";
}

?>

<!-- HTML form to accept personal information -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="gender">Gender:</label>
    <select name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select><br>

    <label for="dob">Date of Birth:</label>
    <input type="date" name="dob" required><br>

    <label for="address">Address:</label>
    <textarea name="address" rows="4" required></textarea><br>

    <label for="city">City:</label>
    <input type="text" name="city" required><br>

    <label for="country">Country:</label>
    <input type="text" name="country" required><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
