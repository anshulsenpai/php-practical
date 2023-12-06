<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Task 1: List the names of teachers who are teaching a student named “Avinash”
$query1 = "SELECT DISTINCT t.t_name
           FROM Teacher t
           JOIN Teaches te ON t.t_no = te.t_no
           JOIN Student s ON s.s_no = te.s_no
           WHERE s.s_name = 'Avinash'";
$result1 = $conn->query($query1);

echo "Teachers teaching Avinash:<br>";
while ($row1 = $result1->fetch_assoc()) {
    echo $row1["t_name"] . "<br>";
}

// Task 2: List the names of students to whom a teacher is teaching
$teacherName = 'TeacherName'; // Replace with the actual teacher name
$query2 = "SELECT DISTINCT s.s_name
           FROM Teacher t
           JOIN Teaches te ON t.t_no = te.t_no
           JOIN Student s ON s.s_no = te.s_no
           WHERE t.t_name = '$teacherName'";
$result2 = $conn->query($query2);

echo "<br>Students taught by $teacherName:<br>";
while ($row2 = $result2->fetch_assoc()) {
    echo $row2["s_name"] . "<br>";
}

// Task 3: List the details of all teachers whose names start with the alphabet ‘T’
$query3 = "SELECT * FROM Teacher WHERE t_name LIKE 'T%'";
$result3 = $conn->query($query3);

echo "<br>Teachers whose names start with 'T':<br>";
while ($row3 = $result3->fetch_assoc()) {
    echo $row3["t_no"] . " | " . $row3["t_name"] . " | " . $row3["qualification"] . " | " . $row3["experience"] . "<br>";
}

// Task 4: List the names of teachers teaching subject ‘DBMS’
$subject = 'DBMS'; // Replace with the actual subject
$query4 = "SELECT DISTINCT t.t_name
           FROM Teacher t
           JOIN Teaches te ON t.t_no = te.t_no
           WHERE te.subject = '$subject'";
$result4 = $conn->query($query4);

echo "<br>Teachers teaching $subject:<br>";
while ($row4 = $result4->fetch_assoc()) {
    echo $row4["t_name"] . "<br>";
}

// Task 5: Find the number of teachers having qualification as ‘Ph.D.’
$qualification = 'Ph.D.'; // Replace with the actual qualification
$query5 = "SELECT COUNT(*) as count
           FROM Teacher
           WHERE qualification = '$qualification'";
$result5 = $conn->query($query5);
$row5 = $result5->fetch_assoc();
echo "<br>Number of teachers with Ph.D.: " . $row5["count"] . "<br>";

// Task 6: Find the number of students living in ‘Cidco’
$address = 'Cidco'; // Replace with the actual address
$query6 = "SELECT COUNT(*) as count
           FROM Student
           WHERE s_addr = '$address'";
$result6 = $conn->query($query6);
$row6 = $result6->fetch_assoc();
echo "<br>Number of students living in $address: " . $row6["count"] . "<br>";

// Close the connection
$conn->close();

?>
