<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate the login credentials (in a real-world scenario, you would check against a database)
        $username = "demo";
        $password = "demo123";

        $enteredUsername = $_POST["username"];
        $enteredPassword = $_POST["password"];

        if ($enteredUsername == $username && $enteredPassword == $password) {
            echo "<p style='color: green;'>Login successful!</p>";
        } else {
            echo "<p style='color: red;'>Invalid username or password.</p>";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
