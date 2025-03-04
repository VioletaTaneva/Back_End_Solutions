<?php
$animals = ["Cat", "Dog", "Mouse", "Lion", "Tiger", "Elephant", "Giraffe", "Zebra", "Dolphin", "Wolf", "Penguin"];
sort($animals);
echo implode(", ", $animals); // Display sorted animals

// Fix: Define $mamals as an array of separate strings
$mamals = ["Horse", "Moose", "Deer"];
sort($mamals); // Sort the $mamals array

$amountOfAnimals = count($animals);
$searchAnimal = "Dog";

if (in_array($searchAnimal, $animals)) {
    $result = "Searching for " . $searchAnimal . " - You found me!";
} else {
    $result = "Searching for " . $searchAnimal . " - You didn't find me. :(";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/directory.css">
    <link rel="stylesheet" type="text/css" href="/css/facade.css">
</head>

<body>
    <p>Amount of animals: <?php echo $amountOfAnimals; ?></p>
    <p><?php echo $result; ?></p>
    

    <p>Mamals: <?php echo implode(", ", $mamals); ?></p>
    
    <p><?php echo implode(", ", $animals) . ", " . implode(", ", $mamals); ?></p>
</body>
</html>
