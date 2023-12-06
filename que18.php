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

// Task 1: Find the details of the maximum experienced teacher
$sql_task1 = "SELECT *
              FROM Teacher
              ORDER BY experience DESC
              LIMIT 1";

$result_task1 = $conn->query($sql_task1);

if ($result_task1->num_rows > 0) {
    echo "1. Details of the maximum experienced teacher:\n";
    echo "<table border='1'>
          <tr>
              <th>Teacher Number</th>
              <th>Name</th>
              <th>Qualification</th>
              <th>Experience</th>
          </tr>";
    while ($row = $result_task1->fetch_assoc()) {
        echo "<tr>
                  <td>" . $row['t_no'] . "</td>
                  <td>" . $row['t_name'] . "</td>
                  <td>" . $row['qualification'] . "</td>
                  <td>" . $row['experience'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found for task 1\n";
}

// Task 2: Find the names of students of class 'SYBCA' and living at 'Kothrud'
$sql_task2 = "SELECT s_name
              FROM Student
              WHERE s_class = 'SYBCA' AND s_addr = 'Kothrud'";

$result_task2 = $conn->query($sql_task2);

if ($result_task2->num_rows > 0) {
    echo "\n2. Names of students of class 'SYBCA' and living at 'Kothrud':\n";
    while ($row = $result_task2->fetch_assoc()) {
        echo $row['s_name'] . "\n";
    }
} else {
    echo "No records found for task 2\n";
}

// Task 3: List names of students exactly containing 6 characters
$sql_task3 = "SELECT s_name
              FROM Student
              WHERE LENGTH(s_name) = 6";

$result_task3 = $conn->query($sql_task3);

if ($result_task3->num_rows > 0) {
    echo "\n3. Names of students exactly containing 6 characters:\n";
    while ($row = $result_task3->fetch_assoc()) {
        echo $row['s_name'] . "\n";
    }
} else {
    echo "No records found for task 3\n";
}

// Task 4: List names of all teachers with their subjects along with the total number of students they are teaching
$sql_task4 = "SELECT t.t_name, t.subject, COUNT(st.s_no) AS total_students
              FROM Teacher t
              JOIN Teaches ts ON t.t_no = ts.t_no
              JOIN Student st ON ts.s_no = st.s_no
              GROUP BY t.t_name, t.subject";

$result_task4 = $conn->query($sql_task4);

if ($result_task4->num_rows > 0) {
    echo "\n4. Names of all teachers with their subjects along with the total number of students they are teaching:\n";
    echo "<table border='1'>
          <tr>
              <th>Teacher Name</th>
              <th>Subject</th>
              <th>Total Students</th>
          </tr>";
    while ($row = $result_task4->fetch_assoc()) {
        echo "<tr>
                  <td>" . $row['t_name'] . "</td>
                  <td>" . $row['subject'] . "</td>
                  <td>" . $row['total_students'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found for task 4\n";
}

// Task 5: To add a "phono" column in the Student table
$sql_task5 = "ALTER TABLE Student ADD COLUMN phono VARCHAR(15)";

if ($conn->query($sql_task5) === TRUE) {
    echo "\n5. 'phono' column added to the Student table\n";
} else {
    echo "Error adding 'phono' column: " . $conn->error;
}

// Task 6: Drop the Student and Teacher tables
$sql_task6_student = "DROP TABLE Student";
$sql_task6_teacher = "DROP TABLE Teacher";

if ($conn->query($sql_task6_student) === TRUE && $conn->query($sql_task6_teacher) === TRUE) {
    echo "\n6. Student and Teacher tables dropped successfully\n";
} else {
    echo "Error dropping tables: " . $conn->error;
}

// Close the connection
$conn->close();

?>
