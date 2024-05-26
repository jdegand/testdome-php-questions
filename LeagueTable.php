<?php

class LeagueTable
{
    private $standings = [];

    public function __construct(array $players)
    {
        foreach ($players as $index => $p) {
            $this->standings[$p] = [
                'index'        => $index,
                'games_played' => 0,
                'score'        => 0
            ];
        }
    }

    public function recordResult(string $player, int $score): void
    {
        $this->standings[$player]['games_played']++;
        $this->standings[$player]['score'] += $score;
    }

    public function playerRank(int $rank): string
    {
        $sortedPlayers = array_keys($this->standings);
        usort($sortedPlayers, function ($a, $b) {
            if ($this->standings[$a]['score'] == $this->standings[$b]['score']) {
                if ($this->standings[$a]['games_played'] == $this->standings[$b]['games_played']) {
                    return $this->standings[$a]['index'] - $this->standings[$b]['index'];
                }
                return $this->standings[$a]['games_played'] - $this->standings[$b]['games_played'];
            }
            return $this->standings[$b]['score'] - $this->standings[$a]['score'];
        });

        return $sortedPlayers[$rank - 1];
    }
}

$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 5);
echo $table->playerRank(1);