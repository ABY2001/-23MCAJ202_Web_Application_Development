<?php
// Create an array of student names
$students = array("Aby", "Bibin", "Shabin", "Yedhu", "Catherine");

// Function to display the array
function displayArray($array) {
    echo "Student Names: ";
    foreach ($array as $student) {
        echo $student . " ";
    }
    echo "<br>";
}

// Display original array
displayArray($students);

// Sort and display using asort (maintains index association, sorts by value in ascending order)
asort($students);
echo "After asort (ascending order): ";
displayArray($students);

// Sort and display using arsort (maintains index association, sorts by value in descending order)
arsort($students);
echo "After arsort (descending order): ";
displayArray($students);
?>