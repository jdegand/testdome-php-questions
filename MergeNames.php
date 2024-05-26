<?php

function unique_names(array $array1, array $array2): array
{
    return array_unique (array_merge ($array1, $array2));
}

$names = unique_names(['Ava', 'Emma', 'Olivia'], ['Olivia', 'Sophia', 'Emma']);
echo join(', ', $names); // should print Emma, Olivia, Ava, Sophia