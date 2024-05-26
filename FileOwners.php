<?php

function groupByOwners(array $files) : array
{
 $result = array();
    foreach ($files as $file => $owner) {
        if (!array_key_exists($owner, $result)) {
            $result[$owner] = array();
        }
        $result[$owner][] = $file;
    }
    return $result;
}

$files = array(
    "Input.txt" => "Randy",
    "Code.py" => "Stan",
    "Output.txt" => "Randy"
);
var_dump(groupByOwners($files));