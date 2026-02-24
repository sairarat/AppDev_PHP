<?php
/*
# Names Challenge

## Instructions

1. Take the array of names below and loop through them. The type of loop is up to you.
   $names = ['ALEC', 'BETH', 'CAROLINE', 'DAve', 'ElAnor', 'ANNa', 'Freddie', 'AdaM'];

2. Within the loop, use a conditional statement to check if the first letter of the name is 'A'.

3. If the first letter is 'A', skip that name and continue to the next iteration.

4. If the first letter is not 'A', reverse the string.

5. Make all names lowercase before printing them.

### Hints
- You can use indexes to access the first character of a string. ($string[0]) or you can use the `substr()` function.
- You can reverse a string using the `strrev()` function.
- You can make a string lowercase using the `strtolower()` function.
- You can skip an iteration of a loop using the `continue` keyword.
*/

/*  The result should like this 

        hteb
        enilorac
        evad
        ronale
        eidderf

*/

$names = ["ALEC", "BETH", "CAROLINE", "DAVE", "ELANOR", "ANNA", "FREDDIE", "ADAM"];
$letter = 'A';

    foreach($names as $name){
        $firstLetter = substr($name, 0, 1);

        if($firstLetter != $letter){
            $name = strtolower($name);
            echo strrev($name ). "<br>";
        }
    }
?>