<?php

// Database connection details
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

// SQL query to create the employee table
$sql = "CREATE TABLE IF NOT EXISTS employee (
    emp_number INT PRIMARY KEY,
    emp_name VARCHAR(50) NOT NULL,
    emp_address VARCHAR(100),
    joining_date DATE,
    salary DECIMAL(10, 2)
)";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Employee table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();

?>
