<?php
$numbers = range(0, 100);
$index = 0;

//echo implode(", ", $numbers); 

while ($index < count($numbers)) { //we use < instead of = because array 100 = 101 and we dont want it here
    $number = $numbers[$index];
    
    if ($number > 40 && $number < 80 && $number % 3 == 0) {
        echo $number . " ";
    }
    ++$index; //++$index is better and faster then $index++
    
}   //watch out where you put your index :))))))))))

?>
