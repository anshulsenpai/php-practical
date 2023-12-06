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

// SQL query to select and display records before update
$sql_select_before = "SELECT * FROM Employee";

$result_before = $conn->query($sql_select_before);

if ($result_before->num_rows > 0) {
    echo "Records before update:\n";
    echo "<table border='1'>
          <tr>
              <th>Employee Number</th>
              <th>Name</th>
              <th>Salary</th>
          </tr>";
    while ($row = $result_before->fetch_assoc()) {
        echo "<tr>
                  <td>" . $row['eno'] . "</td>
                  <td>" . $row['name'] . "</td>
                  <td>" . $row['salary'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found\n";
}

// SQL query to update salary by 10%
$sql_update_query = "UPDATE Employee SET salary = salary * 1.1";

// Perform the update
if ($conn->query($sql_update_query) === TRUE) {
    echo "\nRecords updated successfully\n";
    
    // SQL query to select and display records after update
    $sql_select_after = "SELECT * FROM Employee";

    $result_after = $conn->query($sql_select_after);

    if ($result_after->num_rows > 0) {
        echo "Updated Records:\n";
        echo "<table border='1'>
              <tr>
                  <th>Employee Number</th>
                  <th>Name</th>
                  <th>Salary</th>
              </tr>";
        while ($row = $result_after->fetch_assoc()) {
            echo "<tr>
                      <td>" . $row['eno'] . "</td>
                      <td>" . $row['name'] . "</td>
                      <td>" . $row['salary'] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found after update\n";
    }
} else {
    echo "Error updating records: " . $conn->error;
}

// Close the connection
$conn->close();

?>
