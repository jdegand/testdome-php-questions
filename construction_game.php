<?php
class ConstructionGame
{
    private $length;
    private $width;
    private $table;

    public function __construct(int $length, int $width)
    {
        $this->length = $length;
        $this->width = $width;
        $this->table = array_fill(0, $length, array_fill(0, $width, 0));
    }

    public function addCubes(array $cubes): void
    {
        for ($i = 0; $i < $this->length; $i++) {
            for ($j = 0; $j < $this->width; $j++) {
                if ($cubes[$i][$j]) {
                    $this->table[$i][$j]++;
                }
            }
        }

        // Clear full layers
        $this->clearFullLayers();
    }

    private function clearFullLayers(): void
    {
        $maxHeight = $this->getHeight();

        for ($h = $maxHeight; $h > 0; $h--) {
            $fullLayer = true;
            for ($i = 0; $i < $this->length; $i++) {
                for ($j = 0; $j < $this->width; $j++) {
                    if ($this->table[$i][$j] < $h) {
                        $fullLayer = false;
                        break 2; // Break both loops
                    }
                }
            }

            if ($fullLayer) {
                // Clear the full layer by reducing height
                for ($i = 0; $i < $this->length; $i++) {
                    for ($j = 0; $j < $this->width; $j++) {
                        if ($this->table[$i][$j] >= $h) {
                            $this->table[$i][$j]--;
                        }
                    }
                }
            }
        }
    }

    public function getHeight(): int
    {
        $maxHeight = 0;
        foreach ($this->table as $row) {
            foreach ($row as $height) {
                if ($height > $maxHeight) {
                    $maxHeight = $height;
                }
            }
        }
        return $maxHeight;
    }
}

// Example usage
$game = new ConstructionGame(2, 2);

// Test case 1
$game->addCubes([
    [true, true],
    [false, false]
]);
$game->addCubes([
    [true, true],
    [false, true]
]);
echo $game->getHeight() . "\n"; // should print 2

// Test case 2
$game->addCubes([
    [false, false],
    [true, true]
]);
echo $game->getHeight() . "\n"; // should print 1

// Additional test case
$game2 = new ConstructionGame(3, 3);
$game2->addCubes([
    [true, true, true],
    [false, false, false],
    [false, false, false]
]);
echo $game2->getHeight() . "\n"; // should print 1

$game2->addCubes([
    [false, false, false],
    [true, true, true],
    [false, false, false]
]);
echo $game2->getHeight() . "\n"; // should print 2

$game2->addCubes([
    [false, false, false],
    [false, false, false],
    [true, true, true]
]);
echo $game2->getHeight() . "\n"; // should print 1
