<?php

namespace App\Card;

class Player extends Hand
{
    protected Hand $playersHand;
    protected int $score;

    /**
     * __construct
     * @SuppressWarnings(PHPMD.MissingImport)
     */
    public function __construct()
    {
        $this->playersHand = new \App\Card\Hand();
        $this->score = 0;
    }

    /**
     * getPlayersHand
     *
     * @return Hand
     */
    public function getPlayersHand()
    {
        return $this->playersHand;
    }

    /**
     * emptyHand
     *
     * @return void
     */
    public function emptyHand()
    {
        parent::__construct();
    }
}
