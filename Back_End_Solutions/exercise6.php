<?php

$number = rand(1, 100);

if ($number >= 1 && $number <= 10) {
    $range = '1 and 10';
} elseif ($number >= 11 && $number <= 20) {
    $range = '11 and 20';
} elseif ($number >= 21 && $number <= 30) {
    $range = '21 and 30';
} elseif ($number >= 31 && $number <= 40) {
    $range = '31 and 40';
} elseif ($number >= 41 && $number <= 50) {
    $range = '41 and 50';
} elseif ($number >= 51 && $number <= 60) {
    $range = '51 and 60';
} elseif ($number >= 61 && $number <= 70) {
    $range = '61 and 70';
} elseif ($number >= 71 && $number <= 80) {
    $range = '71 and 80';
} elseif ($number >= 81 && $number <= 90) {
    $range = '81 and 90';
} elseif ($number >= 91 && $number <= 100) {
    $range = '91 and 100';
}

$message = "The number lies between $range";

$reversed_message = strrev($message);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/directory.css">
    <link rel="stylesheet" type="text/css" href="/css/facade.css">
    <title>Number Range</title>
</head>
<body>

    <h1>Random Number Range</h1>
    <p><strong>Random Number:</strong> <?php echo $number; ?></p>
    <p><strong>Original Message:</strong> <?php echo $message; ?></p>
    <p><strong>Reversed Message:</strong> <?php echo $reversed_message; ?></p>

</body>
</html>
