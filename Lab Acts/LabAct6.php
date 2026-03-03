<?php
/*# Function Challenges
Up to this point in the course, we have looked at variables, arrays, loops, conditionals, and functions. We will now put all of this knowledge together to solve some problems.

## Challenge 1: Fahrenheit to Celsius 3pts
Write a function called `fahrenheitToCelsius` that takes a temperature in Fahrenheit as an argument and returns the temperature in Celsius.

  - Create a named function called `fahrenheitToCelsius` that takes a fahrenheit temperature as an argument. 
  - Return the temperature converted to Celsius.
  - Print to the screen like "68F = 20C. You can use the &deg; entity for the degrees symbol. and 
    &degC for celsius
  - For extra points, convert to an arrow function +2pts

    sample output   68°F = 20°
    */
    $fahrenheit = 68;
    $celsius = null;
    echo "<h3><strong>Challenge 1: Fahrenheit to Celsius: <br></strong></h3>";
    echo "Fahrenheit: " . $fahrenheit . "&deg;F <br><br>";

    //Alternative Way
    /*function fahrenheitToCelsius($fahrenheit) {
        $celsius = ($fahrenheit - 32) * 5 / 9;
        return $celsius;
    }
        fahrenheitToCelsius($fahrenheit);
        echo $fahrenheit . "&deg;F = " . $celsius . "&deg;C"; 
    */

    //Fahrenheit to Celsius using Arrow Function
    $fahrenheitToCelsius = fn($fahrenheit) => ($fahrenheit - 32) * 5/9;
    $celsius = $fahrenheitToCelsius($fahrenheit);
    echo $fahrenheit . "&deg;F = " . $celsius . "&deg;C"; 
    echo "<br><br>";
?>
<?php
/*
## Challenge 2: Print Names In Uppercase 5pts

Create a function called `printNamesToUpperCase` that takes an array of names as an argument. The function should loop through the array and print each name to the screen in uppercase letters.

### Hints
  $names = ['Alice', 'Bob', 'Charlie', 'David'];
- You can use the `strtoupper` function to convert a string to uppercase.

  sample  output
        ALICE
        BOB
        CHARLIE
        DAVID
*/
    echo "<hr/><h3><strong>Challenge 2: Print Names In Uppercase: <br></h3></strong>";
     $names = ['Alice', 'Bob', 'Charlie', 'David'];
     echo "Names: " . var_dump($names) . "<br><br>";

    function printNamesToUpperCase($names){
        foreach($names as $name){
            echo strtoupper($name) . "<br>";
        }
    }

    printNamesToUpperCase($names);
    echo "<br><br>";
?>

<?php
/*
## Challenge 3: Find the longest word 10pts

Let's do something a bit harder.

1. Create a function called `findLongestWord` that takes a sentence as an argument.
2. The function should return the longest word in the sentence.

### Hints

- You will need to use the `explode` function to split the sentence into an array of words.
- You will need to use the `strlen` function to find the length of each word.
- You will need to use a loop to loop through the array of words.
- You will need to use a conditional to check if the current word is longer than the longest word you have found so far.


It it should look like this:

$sentence = 'The quick brown fox jumped over the lazy dog';
$longestWord = findLongestWord($sentence);
echo $longestWord; // should print 'jumped'


ouput
jumped
*/

    echo "<hr/><h3><strong>Challenge 3: Find the Longest Word: <br></strong></h3>";
    echo "Sentence: The quick brown fox jumped over the lazy dog <br>";

    $sentence = 'The quick brown fox jumped over the lazy dog';
    function findLongestWord($sentence){
        $LongestWord = '';
        $words = explode(' ', $sentence);
        foreach($words as $word){
            if(!isset($LongestWord) || strlen($word) > strlen($LongestWord)){
                $LongestWord = $word;
            }
        }
       return $LongestWord;
    }

     echo "Longest word: " . findLongestWord($sentence);
?>
