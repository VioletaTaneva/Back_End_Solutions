<?php
    $numbers = [8, 7, 8, 7, 3, 2, 1, 2, 4];
    
    $noDupes = array_unique($numbers);
    
    rsort($noDupes);
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

<p>We no likey duplicates so we have removed them:</p>
<p><?php echo implode(", ", $noDupes); ?></p>


</body>
</html>
