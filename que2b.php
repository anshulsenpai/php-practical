<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Background Color</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            transition: background-color 0.5s ease;
        }
    </style>
</head>
<body>

<?php

function getBackgroundColor($dayOfWeek) {
    switch ($dayOfWeek) {
        case 1: // Monday
            return "tomato"; // Tomato
        case 2: // Tuesday
            return "skyblue"; // SkyBlue
        case 3: // Wednesday
            return "greenyellow"; // GreenYellow
        case 4: // Thursday
            return "gold"; // Gold
        case 5: // Friday
            return "darkorchid"; // DarkOrchid
        case 6: // Saturday
            return "orangered"; // OrangeRed
        case 7: // Sunday
            return "dodgerblue"; // DodgerBlue
        default:
            return "white"; // Default to White
    }
}

// Get the current day of the week (1 for Monday, 2 for Tuesday, ..., 7 for Sunday)
$currentDayOfWeek = date("N");

// Get the background color based on the day of the week
$backgroundColor = getBackgroundColor($currentDayOfWeek);

// Output the style tag with the background color
echo '<script>document.body.style.backgroundColor = "' . $backgroundColor . '";</script>';

?>

<!-- Your HTML content goes here -->

</body>
</html>
