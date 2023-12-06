<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>

<div class="registration-container">
    <h2>Registration</h2>
    <?php
    // Define variables to store user input and error messages
    $username = $email = $password = $confirmPassword = "";
    $usernameErr = $emailErr = $passwordErr = $confirmPasswordErr = "";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate username
        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
        } else {
            $username = test_input($_POST["username"]);
        }

        // Validate email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // Check if the email address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        // Validate password
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
        }

        // Validate confirm password
        if (empty($_POST["confirmPassword"])) {
            $confirmPasswordErr = "Confirm Password is required";
        } else {
            $confirmPassword = test_input($_POST["confirmPassword"]);
            // Check if the passwords match
            if ($password != $confirmPassword) {
                $confirmPasswordErr = "Passwords do not match";
            }
        }

        // If there are no validation errors, you can proceed with further actions (e.g., database insertion)
        // For this example, we'll simply display a success message
        if (empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
            echo "<p style='color: green;'>Registration successful!</p>";
        }
    }

    // Helper function to sanitize user input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
        <span class="error"><?php echo $usernameErr; ?></span>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span>

        <label for="password">Password:</label>
        <input type="password" name="password">
        <span class="error"><?php echo $passwordErr; ?></span>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" name="confirmPassword">
        <span class="error"><?php echo $confirmPasswordErr; ?></span>

        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>
