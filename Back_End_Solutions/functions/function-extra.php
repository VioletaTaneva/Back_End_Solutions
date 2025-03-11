<?php

$toys = [
    "Cars" => ["Racecar", "SUV", "Sedan"],
    "Dolls" => ["Barbie", "Ken", "Fairy"],
    "Stuffed Animals" => ["Teddy Bear", "Lion", "Elephant"],
];

// Now we create a helper (the function) that will say each toy's name
function printArray($array) {
    foreach($array as $category => $toys) { 
        echo "Category: [$category] <br>";

        foreach($toys as $index => $toy) {
            echo "Toy[" . $index . "] has value '" . $toy . "'<br>";
        }
    }
}

function validateHtmlTag($html) {
    // checks if there is an html
    if (strpos($html, '<html>') !== false && strpos($html, '</html>') !== false) {
        echo "Valid <html> tag is present!<br>";
    } else {
        echo "Valid <html> tag is not present!<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/directory.css">
    <link rel="stylesheet" type="text/css" href="/css/facade.css">
    <title>Function extra</title>
</head>
<body>
    
<h1>Function Results</h1>
<!-- need to put both opne and closed html tags -->
<h3><?php validateHtmlTag("<html></html>");?></h3> 
<p><?php printArray($toys);?> </p>

</body>
</html>
