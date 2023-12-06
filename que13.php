<?php

$servername = "localhost";
$username = "anshul";
$password = "";
$dbname = "myDb";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db($dbname);

// Create Employee table
$sql_create_employee_table = "CREATE TABLE IF NOT EXISTS Employee (
    eno INT PRIMARY KEY,
    ename VARCHAR(50) NOT NULL,
    sal DECIMAL(10, 2) NOT NULL
)";
$conn->query($sql_create_employee_table);

// Create Project table
$sql_create_project_table = "CREATE TABLE IF NOT EXISTS Project (
    pno INT PRIMARY KEY,
    pname VARCHAR(50) NOT NULL,
    duration INT NOT NULL
)";
$conn->query($sql_create_project_table);

// Create junction table for the many-to-many relationship
$sql_create_junction_table = "CREATE TABLE IF NOT EXISTS Employee_Project (
    eno INT,
    pno INT,
    PRIMARY KEY (eno, pno),
    FOREIGN KEY (eno) REFERENCES Employee(eno),
    FOREIGN KEY (pno) REFERENCES Project(pno)
)";
$conn->query($sql_create_junction_table);

$conn->close();

?>
