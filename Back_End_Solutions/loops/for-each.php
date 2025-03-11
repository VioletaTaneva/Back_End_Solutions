<?php
// get text file. I made a random one
$filePath = 'text-file.txt';

// Use file_get_contents to read the content of the file and store it in $text
$text = file_get_contents($filePath);

//The extra is here
// sry if i missunderstood
// I just find the extra exercise the same as the main exerice but with lowercase leters 
$text = strtolower($text);


// split characters into array
$textChars = str_split($text);

rsort($textChars);
$textChars = array_reverse($textChars);

$char_count = array_count_values($textChars);
//print_r ($char_count); 

// see how many unique caracters we have
$uniqueChars = array_unique($textChars);
$unique_count = count($uniqueChars);

//echo "<pre"; 
//print_r($uniqueChars);
//print_r($unique_count);


//see how many characters we have in total
$total_characters = strlen($text);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/global.css">
	<link rel="stylesheet" type="text/css" href="/css/directory.css">
	<link rel="stylesheet" type="text/css" href="/css/facade.css">
    <title>Character Counter</title>
</head>
<body>

<p>Total number of characters in the text: <?php echo $total_characters; ?></p>
<p>Total unique characters: <?php echo $unique_count; ?></p>

<p>Character occurrences:</p>
<ul>
    <?php
    foreach ($char_count as $char => $count) {
        echo "<li>'" . $char . "' appears " . $count . " times</li>";
    }
    ?>
</ul>

</body>
</html>
