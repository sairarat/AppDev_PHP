<?php
//Ternary Operator

$favoriteColor = 'Red';
$secondFavoriteColor = 'Yellow';
//$color = isset($favoriteColor) ? $favoriteColor : 'Blue';

// ??if variable doesn't have a value or its null 
//it will set the variable to be the assigned 
//$color = $favoriteColor ?? 'blue';

//echo $color;

//$color2 = isset($favoriteColor) ? $favoriteColor : (isset($secondFavoriteColor) ? $secondFavoriteColor : 'Blue');
$color2 = $favoriteColor ?? $secondFavoriteColor ?? 'Blue';
echo $color2;
