<?php

$output=null;
$users=null;

$fruits = [
    //0         //1
    ['Apple', 'Red'], //0
    ['Oranges', 'Orange'], //1
    ['Banana', 'Yellow'] //2
];

//row-column
$output = $fruits[0][1];

//Multi-dimensional Associative Arrays
$users = [
    ['name' => 'John', 'email' => 'john@gmail.com', 'password' => 'secret'],
    ['name' => 'Francine', 'email' => 'francine@gmail.com', 'password' => 'bts'],
    ['name' => 'Yna', 'email' => 'yna@gmail.com', 'password' => 'toge']
];

$output = $users[0]['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>PHP From Scratch</title>
</head>
<body class="bg-gray-100">
    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold">PHP Multidimensional Arrays</h1>
        </div>
    </header>

    <div class="container mx-auto p-4 mt-4">
        <div class="bg-white rounded-lg shadow-md p-6 mt-6">
            <h2 class="text-2xl font-semibold mb-4">Output:</h2>
            <p class="text-xl"><?= $output ?></p>

            <h2 class="text-xl font-semibold my-4">Users Array:</h2>
            <pre><?php print_r($users); ?></pre>
        </div>
    </div>
</body>
</html>