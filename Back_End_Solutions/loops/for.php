<?php
$numbers = range(0, 100);

 //for ($i=0; $i < ; $i++) {   # code... }
 
for ($index = 0; $index < count($numbers); ++$index) {
    $number = $numbers[$index];

    if ($number > 40 && $number < 80 && $number % 3 == 0) {
        echo $number . " ";
    }
}
?>
