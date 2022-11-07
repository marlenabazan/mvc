<?php

namespace App\Card;

class Player extends Hand
{
    // private string $playersName;
    protected int $score;

    public function __construct()
    {
        // $this->playersName = $playersName;
        $this->playersHand = new \App\Card\Hand();
        // $this->playersHand = parent::__construct();
        $this->score = 0;
    }

    public function getPlayersHand()
    {
        return $this->playersHand;
    }

    public function emptyHand()
    {
        parent::__construct();
    }

    public function getScore()
    {
        return $this->score;
    }

    public function addPoints(int $points)
    {
        // $this->score += $points;
        $this->score = $this->score + $points;
        return $this->score;
    }
}
