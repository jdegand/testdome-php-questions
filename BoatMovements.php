<?php

/**
 * @return boolean The destination is reachable or not
 */
function canTravelTo($gameMatrix, $fromRow, $fromColumn, $toRow, $toColumn) {
    // Check if coordinates are within bounds
    if ($toRow < 0 || $toColumn < 0 || $toRow >= count($gameMatrix) || $toColumn >= count($gameMatrix[0]) ||
        $fromRow < 0 || $fromColumn < 0 || $fromRow >= count($gameMatrix) || $fromColumn >= count($gameMatrix[0])) {
        return false;
    }

    // Check if destination cell is traversable
    if (!$gameMatrix[$toRow][$toColumn]) {
        return false;
    }

    // Check if moving within the same row
    if ($fromRow === $toRow) {
        if ($toColumn === $fromColumn + 1 || $toColumn === $fromColumn - 1) {
            return true;
        }
    }

    // Check if moving within the same column
    if ($fromColumn === $toColumn) {
        if ($toRow === $fromRow + 1 || $toRow === $fromRow - 1) {
            return true;
        }
    }

    // If not a valid move, return false
    return false;
}

$gameMatrix = [
    [false, true, true, false, false, false],
    [true, true, true, false, false, false],
    [true, true, true, true, true, true],
    [false, true, true, false, true, true],
    [false, true, true, true, false, true],
    [false, false, false, false, false, false],
];

echo canTravelTo($gameMatrix, 3, 2, 2, 2) ? "true\n" : "false\n"; // true, Valid move
echo canTravelTo($gameMatrix, 3, 2, 3, 4) ? "true\n" : "false\n"; // false, Can't travel through land
echo canTravelTo($gameMatrix, 3, 2, 6, 2) ? "true\n" : "false\n"; // false, Out of bounds


?>
