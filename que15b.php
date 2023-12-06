<?php

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create the student table
$sql_create_table = "CREATE TABLE IF NOT EXISTS student (
    rollno INT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    per DECIMAL(5, 2) NOT NULL
)";

// Execute the query
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table 'student' created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();

?>
