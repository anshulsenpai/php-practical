<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Array Operations</title>
</head>
<body>

<?php

// Sample associative array
$associativeArray = array(
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3',
    'key4' => 'value4',
    'key5' => 'value5'
);

// Function to display array elements along with keys
function displayArrayWithKeys($array) {
    echo "Array Elements with Keys:<br>";
    foreach ($array as $key => $value) {
        echo "[$key] => $value<br>";
    }
    echo "<br>";
}

// Function to display the size of an array
function displayArraySize($array) {
    $size = count($array);
    echo "Size of the Array: $size<br><br>";
}

// Function to delete an element from an array based on index
function deleteElementAtIndex(&$array, $index) {
    if (isset($array[$index])) {
        unset($array[$index]);
        echo "Element at index $index deleted successfully.<br><br>";
    } else {
        echo "Index $index not found in the array.<br><br>";
    }
}

// Function to reverse the order of each element’s key-value pair
function reverseKeyValuePairs(&$array) {
    $array = array_flip($array);
    echo "Key-Value pairs reversed successfully.<br><br>";
}

// Function to traverse the elements in an array in random order
function traverseArrayInRandomOrder($array) {
    shuffle($array);
    echo "Array Elements in Random Order:<br>";
    foreach ($array as $key => $value) {
        echo "[$key] => $value<br>";
    }
    echo "<br>";
}

// Menu-driven program
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $choice = $_POST["choice"];

    switch ($choice) {
        case 1:
            displayArrayWithKeys($associativeArray);
            break;
        case 2:
            displayArraySize($associativeArray);
            break;
        case 3:
            $indexToDelete = $_POST["indexToDelete"];
            deleteElementAtIndex($associativeArray, $indexToDelete);
            break;
        case 4:
            reverseKeyValuePairs($associativeArray);
            break;
        case 5:
            traverseArrayInRandomOrder($associativeArray);
            break;
        default:
            echo "Invalid choice.<br><br>";
            break;
    }
}

?>

<!-- HTML form for menu input -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label>Select Operation:</label>
    <select name="choice" required>
        <option value="1">Display Array with Keys</option>
        <option value="2">Display Array Size</option>
        <option value="3">Delete Element from Index</option>
        <option value="4">Reverse Key-Value Pairs</option>
        <option value="5">Traverse Array in Random Order</option>
    </select><br>

    <!-- Input for delete operation -->
    <label for="indexToDelete">Enter Index to Delete (for option 3):</label>
    <input type="number" name="indexToDelete"><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
