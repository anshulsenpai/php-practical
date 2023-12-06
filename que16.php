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

// SQL query to select and display records before deletion
$sql_select_before = "SELECT * FROM Employee WHERE salary > 1000";

$result_before = $conn->query($sql_select_before);

if ($result_before->num_rows > 0) {
    echo "Records before deletion:\n";
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
    echo "No records found for the given condition\n";
}

// SQL query to delete employees with salary more than 1000 and fetch the deleted records
$sql_delete_query = "DELETE FROM Employee WHERE salary > 1000";

// Perform the deletion
if ($conn->query($sql_delete_query) === TRUE) {
    echo "\nRecords deleted successfully\n";
    
    // SQL query to select and display records after deletion
    $sql_select_after = "SELECT * FROM Employee WHERE salary > 1000";

    $result_after = $conn->query($sql_select_after);

    if ($result_after->num_rows > 0) {
        echo "Deleted Records:\n";
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
        echo "No records found for the given condition after deletion\n";
    }
} else {
    echo "Error deleting records: " . $conn->error;
}

// Close the connection
$conn->close();

?>
