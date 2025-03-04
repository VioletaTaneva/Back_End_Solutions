<?php

$numbers = [1, 2, 3, 4, 5];

function multiply ($numbers) {
    $total=1;
    foreach ($numbers as $number)
        $total *= $number;
        return $total;
};

$multiplication = multiply($numbers);
//echo "Total sum:" . $multiplication

function oddNumbers($numbers){
    $oddNumbers = [];
    foreach ($numbers as $number) {
        if ($number % 2 != 0) {
            $oddNumbers[] = $number; 
        }
    }
    return implode(", ", $oddNumbers); 
}


$numbers2 = [5, 4, 3, 2, 1];
$sumArrays =[];

for($i = 0; $i < count($numbers); $i++){
    $sum = $numbers[$i] + $numbers2[$i];
    array_push($sumArrays, $sum); //aray_push - puts sum (or whatevr $ you have made) into a new array
};


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/directory.css">
    <link rel="stylesheet" type="text/css" href="/css/facade.css">
</head>
<body>

    <p><?php echo "Total sum: " . $multiplication ?></p>
    <p><?php echo "Odd numbers: " . oddNumbers($numbers2) ?></p>
    <p><?php echo "Sum arrays: " . implode(", ", $sumArrays) ?></p>


</body>
</html>
