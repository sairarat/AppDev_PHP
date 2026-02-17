<?php
/*
  Challenge 3: Calculate the average students grade from an array of students.
*/

// 1. Create the array of students
$students = [
    ['name' => 'John', 'grades' => [85, 90, 92, 88]],
    ['name' => 'Jane', 'grades' => [95, 88, 91, 87]],
    ['name' => 'Joe', 'grades' => [75, 82, 79, 88]]
];

echo '<h3>Average Grade</h3>';

// 2. Iterate over the students array
foreach ($students as $student) {
    $name = $student['name'];
    $grades = $student['grades'];

    // 3. Calculate the average
   
    $average = array_sum($grades) / count($grades);

    echo $name . ': Average Grade = ' . $average . '<br>';
}

/* Sample output to be display
Average Grade
John: Average Grade = 88.75
Jane: Average Grade = 90.25
Joe: Average Grade = 81
*/
?>