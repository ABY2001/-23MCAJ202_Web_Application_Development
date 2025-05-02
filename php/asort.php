<?php
// Create an array of student names
$students = array("Aby", "Bibin", "Shabin", "Yedhu", "Catherine");

// Display original array
echo "Original array: ";
print_r($students);
echo "<br/>";

// Sort and display using asort (maintains index association, sorts by value in ascending order)
asort($students);
echo "After asort (ascending order): ";
print_r($students);
echo "<br/>";

// Sort and display using arsort (maintains index association, sorts by value in descending order)
arsort($students);
echo "After arsort (descending order): ";
print_r($students);
?>