<?php

function calculateGrade($percentage) {
    if ($percentage < 40) {
        return "Fail";
    } elseif ($percentage >= 40 && $percentage <= 50) {
        return "Pass Class";
    } elseif ($percentage > 50 && $percentage <= 60) {
        return "Higher Second Class";
    } elseif ($percentage > 60 && $percentage <= 70) {
        return "First Class";
    } else {
        return "First Class with Distinction";
    }
}

// Example: You can replace this value with the actual percentage obtained by the student
$studentPercentage = 75;

// Calculate and display the grade
$studentGrade = calculateGrade($studentPercentage);
echo "Student Grade: " . $studentGrade;

?>
