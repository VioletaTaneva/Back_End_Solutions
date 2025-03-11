<?php

$pigHealth = 5;
$maximumThrows = 8; 

function calculateHit() {
    global $pigHealth; 

    $hitChance = rand(1, 100); 

    if ($hitChance <= 40) { 
        $pigHealth--; 
        return "Hit! There are only $pigHealth pigs left.";
    } else {
        return "Miss! $pigHealth pigs left in the team.";
    }
}

function launchAngryBird() {
    global $pigHealth, $maximumThrows; 
    static $throws = 0; 

    $throws++; 
    echo "Throw $throws: " . calculateHit() . "<br>";


    if ($throws < $maximumThrows) {
        launchAngryBird();
    } else {
        if ($pigHealth == 0) {
            echo "Won!";
        } else {
            echo "Lost!";
        }
    }
}

launchAngryBird();

?>
