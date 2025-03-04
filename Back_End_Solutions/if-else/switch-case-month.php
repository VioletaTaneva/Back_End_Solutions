<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Season Based on Month</title>
</head>
<body>
    <?php
    
    $month = "march";  

    switch ($month) {  
        case "december":
        case "january":
        case "february":
            echo "The season for $month is Winter.";
            break;
        case "march":
        case "april":
        case "may":
            echo "The season for $month is Spring.";
            break;
        case "june":
        case "july":
        case "august":
            echo "The season for $month is Summer.";
            break;
        case "september":
        case "october":
        case "november":
            echo "The season for $month is Fall.";
            break;
        default:
            echo "This is not a month that I recognize.";
    }
    ?>

</body>
</html>

//idk how to do the user thingy without gpt