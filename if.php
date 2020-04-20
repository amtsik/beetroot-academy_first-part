<?php
$a = "2";
$b = 2;

if ($a === $b) {
    echo "it works";
    echo "<br>";
}

if ($a !== 2) {
    echo "it works 2";
    echo "<br>";
}

switch ($a) {
    case 3:
        echo "3";
        echo "<br>";
        break;
    case 4:
        echo "4";
        echo "<br>";
        break;
    default:
        echo "no matches";
}