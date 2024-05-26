<?php

/**
 * @return boolean The destination is reachable or not
 */
function canTravelTo($gameMatrix, $fromRow, $fromColumn, $toRow, $toColumn) {
    $validMove = true;

    if (!$gameMatrix[$toRow][$toColumn] ||
        $toRow <= -1 || $toColumn <= -1 || $toRow >= count($gameMatrix) || $toColumn >= count($gameMatrix[0]) ||
        $fromRow <= -1 || $fromColumn <= -1 || $fromRow >= count($gameMatrix) || $fromColumn >= count($gameMatrix[0])
    ) {
        $validMove = false;
    } elseif ($fromRow === $toRow) {
        if ($toColumn < $fromColumn - 1 || $toColumn > $fromColumn + 1) {
            $validMove = false;
        } elseif ($toColumn === $fromColumn + 1 && !$gameMatrix[$fromRow][$fromColumn + 1]) {
            $validMove = false;
        }
    } elseif ($toRow === $fromRow - 1 || $toRow === $fromRow + 1) {
        if ($toColumn !== $fromColumn) {
            $validMove = false;
        }
    }

    return $validMove;
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