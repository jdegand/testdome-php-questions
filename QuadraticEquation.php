<?php

/**
 * @return array An array of two elements containing roots in any order
 */
function findRoots($a, $b, $c)
{
    $root = sqrt($b*$b - 4*$a*$c);
    $denominator = 2 * $a;
    $x1 = (-$b + $root) / $denominator;
    $x2 = (-$b - $root) / $denominator;
    
    $results = [];
    $newElements = array($x1, $x2);

    return array_merge($results, $newElements);
}

print_r(findRoots(2, 10, 8));