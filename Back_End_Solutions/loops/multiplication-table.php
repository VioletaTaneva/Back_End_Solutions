<?php
/*
$numbers = range(1, 10); 

$i = 0; //number being multiplied aka the 2 in 2*4

while ($i < count($numbers)) {
    $m = 0; //number being multiplied by aka the 4 in 2*4

    while ($m < count($numbers)) {
        echo $numbers[$i] . " * " . $numbers[$m] . " = " . ($numbers[$i] * $numbers[$m] . " ; ");
        $m++;
    };

    echo "<br>";

    $i++;
}

// Saving the code in case I fuck it up at the table, cause i know it works
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
</head>

<body>

    <h2 style="text-align: center;">Multiplication Table</h2>

    <table>
        <thead> <!-- Table header -->
            <tr> <!-- Row of table -->
                <th></th> <!-- Header cell that's empty -->
                <?php
                $numbers = range(1, 10);
                $i = 0;
                while ($i < count($numbers)) {
                    echo "<th>" . $numbers[$i] . "</th>"; // Print numbers 1-10 in the header
                    $i++;
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Print the multiplication table body
            $i = 0;
            while ($i < count($numbers)) {
                echo "<tr>"; // Start a new row for each number (1 to 10)
                echo "<th>" . $numbers[$i] . "</th>"; // First column for the row number (e.g., 1, 2, 3,...)

                $m = 0; // multiply "function"
                while ($m < count($numbers)) {
                    $result = $numbers[$i] * $numbers[$m];
                    
                    //green evens
                    if ($result % 2 == 0) {
                        echo "<td class ='even'>" . $result . "</td>"; // Add class 'even' for even results
                    } else {
                        echo "<td>" . $result . "</td>"; // Regular cell for odd results
                    }

                    $m++;
                }

                echo "</tr>"; // end the current row
                $i++;
            }
            ?>
        </tbody>
    </table>

    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .even {
            background-color: greenyellow;
        }
    </style>

</body>

</html>