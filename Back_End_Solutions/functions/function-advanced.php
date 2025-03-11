<?php

$md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';


function countUsingSubstr($needle) {
    global $md5HashKey;
    $count = substr_count($md5HashKey, $needle);
    echo "Function 1: The needle '$needle' occurs $count times in the hash key '$md5HashKey'<br>";
}

function countUsingLoop($needle) {
    global $md5HashKey;
    $count = 0;
    foreach (str_split($md5HashKey) as $char) {
        if ($char == $needle) {
            $count++;
        }
    }
    echo "Function 2: The needle '$needle' occurs $count times in the hash key '$md5HashKey'<br>";
}

function countUsingRegex($needle) {
    global $md5HashKey;
    preg_match_all("/$needle/", $md5HashKey, $matches);
    $count = count($matches[0]);
    echo "Function 3: The needle '$needle' occurs $count times in the hash key '$md5HashKey'<br>";
}

countUsingSubstr('2'); 
countUsingLoop('8');  
countUsingRegex('a'); 

?>
