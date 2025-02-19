<?php
    $fruit = 'coconut';
    $fruit_letter_count = strlen($fruit);
    $fruit_letter_find = strpos($fruit, 'o') + 1; // Add +1 cause the sting counts from 0 and it is technically incorect in my opinion

    $fruit2 = 'pineapplea';
    $fruit2_letter_count = strlen($fruit2);
    $fruit2_letter_find = strrpos($fruit2, 'a') + 1; 
    $fruit2_uppercase = strtoupper($fruit2);

    $letter = 'e';
    $number = '3';
    $longerst_word = 'pneumonoultramicroscopicsilicovolcanoconiosis';
    $longerst_word_replaced = str_replace($letter, $number, $longerst_word);
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
    <h1>Part 1</h1>
    <h2><?php echo $fruit; ?></h2>
    <p>Character Count: <?php echo $fruit_letter_count; ?></p>
    <p>First 'o' Position: <?php echo $fruit_letter_find; ?></p>

    <h1>Part 2</h1>
    <h2><?php echo $fruit2; ?></h2>
    <p><?php echo $fruit2_uppercase; ?></p>
    <p>Character Count: <?php echo $fruit2_letter_count; ?></p>
    <p>Last 'a' Position: <?php echo $fruit2_letter_find; ?></p>

    <h1>Part 3</h1>
    <h2>Original word: <?php echo $longerst_word; ?></h2>
    <h2> Replaced letter "<?php echo$letter?>":  <?php echo $longerst_word_replaced;?> </h2>
   

</body>
</html>



