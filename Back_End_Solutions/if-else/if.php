
<?php

$number = 6;
$status = "";
$modified_status = str_replace("A", "a", $status); 

if ($number == 1) {
    $status = "monday";
};
if ($number == 2) {
    $status = "tuesday";
};
if ($number == 3) {
    $status = "wendsday";
};
if ($number == 4) {
    $status = "thursday";
}; 
if ($number == 5) {
    $status = "friday";
};
if ($number == 6) {
    $status = "saturday";
}; 
if ($number == 7) {
    $status = "sunday";
}; 
if ($number > 7) {
    $status = "You exited the week. You are now outside the time continium. Welcome.";
};

$modified_status = strtoupper($status);
$last_a_position = strrpos($modified_status, 'A');


if ($last_a_position !== false) {
    $modified_status = substr_replace($modified_status, 'a', $last_a_position, 1);
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $modified_status ?></h1>
</body>
</html>