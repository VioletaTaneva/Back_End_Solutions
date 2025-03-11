<?php

$num1 = 10;
$num2 = 5;  
$sting = "udon";

function calculateSum($num1, $num2) {
    $result = $num1 + $num2;
    return $result;
}

function multiplication($num1, $num2) {
    $result = $num1 * $num2;
    return $result;
}

function isEven($num1) {
    if ($num1 % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

function length($string) {
    $result = strlen($string);
    return $result;
}

function upercase($string) {
    $result = strtoupper($string);
    return $result;
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
    <title>Character Counter</title>
</head>
<body>

    <h1>Function Results</h1>

    <p><strong>Sum of <?php echo $num1; ?> and <?php echo $num2; ?>:</strong> 
    <?php echo calculateSum($num1, $num2); ?>
    </p>

    <p><strong>Multiplication of <?php echo $num1; ?> and <?php echo $num2; ?>:</strong>
    <?php echo multiplication($num1, $num2); ?>
    </p>
    
    <p><strong>Is <?php echo $num1; ?> even?</strong> 
        <?php echo isEven($num1) ? 'Yes' : 'No'; ?>
    </p>
    
    <p><strong>Length of the string "<?php echo $sting; ?>":</strong> <?php echo length($sting); ?></p>
    
    <p><strong>Uppercase version of "<?php echo $sting; ?>":</strong> <?php echo upercase($sting); ?></p>

</body>
</html>
