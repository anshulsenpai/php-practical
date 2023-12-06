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

// Query to delete employees with salary more than 1000 and fetch the deleted records
$sql_delete_query = "DELETE FROM Employee WHERE salary > 1000";
$sql_select_deleted = "SELECT * FROM Employee WHERE salary > 1000";

// Perform the deletion and retrieval
if ($conn->query($sql_delete_query) === TRUE) {
    echo "Records deleted successfully\n";
    
    // Display the deleted records
    $result = $conn->query($sql_select_deleted);
    
    if ($result->num_rows > 0) {
        echo "Deleted Records:\n";
        echo "<table border='1'>
              <tr>
                  <th>Employee Number</th>
                  <th>Name</th>
                  <th>Salary</th>
              </tr>";
        while ($row = $result->fetch_assoc()) {
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
} else {
    echo "Error deleting records: " . $conn->error;
}

// Close the connection
$conn->close();

?>
