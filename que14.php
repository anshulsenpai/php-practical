<?php

$servername = "localhost";
$username = "anshul";
$password = "";
$dbname = "my_db";

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

// Create Doctor table
$sql_create_doctor_table = "CREATE TABLE IF NOT EXISTS Doctor (
    doc_no INT PRIMARY KEY,
    doc_name VARCHAR(50) NOT NULL,
    address VARCHAR(100),
    city VARCHAR(50),
    area VARCHAR(50)
)";
$conn->query($sql_create_doctor_table);

// Create Hospital table
$sql_create_hospital_table = "CREATE TABLE IF NOT EXISTS Hospital (
    hosp_no INT PRIMARY KEY,
    hosp_name VARCHAR(50) NOT NULL,
    hosp_city VARCHAR(50)
)";
$conn->query($sql_create_hospital_table);

// Create junction table for the many-to-many relationship
$sql_create_junction_table = "CREATE TABLE IF NOT EXISTS Doctor_Hospital (
    doc_no INT,
    hosp_no INT,
    PRIMARY KEY (doc_no, hosp_no),
    FOREIGN KEY (doc_no) REFERENCES Doctor(doc_no),
    FOREIGN KEY (hosp_no) REFERENCES Hospital(hosp_no)
)";
$conn->query($sql_create_junction_table);

$conn->close();

?>
