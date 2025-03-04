<?php
//way 1
$animals = array( "Cat", "Dog", "Lion", "Tiger", "Elephant", "Giraffe", "Zebra", "Dolphin", "Wolf", "Penguin");

//way 2
$animal = [
    "Cat", "Dog", "Lion", "Tiger", "Elephant", "Giraffe", "Zebra", "Dolphin", "Wolf", "Penguin"
];

$cars = [
    "landVehicles"  => ["car", "truck", "bus"],
    "waterVehicles" => ["ship", "yacht", "ferry"],
    "airVehicles"   => ["airplane", "helicopter", "balloon"],
];

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

    <p><?php echo var_dump($cars["landVehicles"]); ?></p>
    <p><?php echo var_dump($cars["waterVehicles"]); ?></p>
    <p><?php echo var_dump($cars["airVehicles"]); ?></p>


</body>
</html>
