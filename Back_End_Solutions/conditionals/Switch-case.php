<?php

$number = 1;

$day = "";

switch ($number) {
    case 1:
        $day = "Monday";
        break;
    case 2:
        $day = "Tuesday";
        break;
    case 3:
        $day = "Wednesday";
        break;
    case 4:
        $day = "Thursday";
        break;
    case 5:
        $day = "Friday";
        break;
    case 6:
        $day = "Saturday";
        break;
    case 7:
        $day = "Sunday";
        break;
    default:
        $day = "Invalid day number";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Day of the Week</title>
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/directory.css">
    <link rel="stylesheet" type="text/css" href="/css/facade.css">
</head>
<body>

    <h1>Day of the Week</h1>
    <p>The day corresponding to the number <?php echo $number; ?> is: <strong><?php echo $day; ?></strong></p>

</body>
</html>
