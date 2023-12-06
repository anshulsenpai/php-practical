<?php

// Function to set or update the access count in a cookie
function updateAccessCount() {
    $cookieName = "accessCount";

    // Check if the cookie is set
    if (!isset($_COOKIE[$cookieName])) {
        // If the cookie is not set, set it to 1
        $count = 1;
    } else {
        // If the cookie is set, increment the count
        $count = $_COOKIE[$cookieName] + 1;
    }

    // Set the cookie with the updated count and an expiration time (e.g., 1 day)
    setcookie($cookieName, $count, time() + (86400 * 1), "/"); // 86400 seconds = 1 day

    return $count;
}

// Get the current access count
$accessCount = updateAccessCount();

// Display the access count
echo "<h2>Page Access Counter</h2>";
echo "<p>This web page has been accessed $accessCount times.</p>";

?>