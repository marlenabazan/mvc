<?php

namespace App\Card;

class Deck extends Card
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getDeck()
    {
        return $this->deck;
    }

    public function shuffle()
    {
        shuffle($this->deck);
        return $this->deck;
    }

    public function getFaces()
    {
        return $this->faces;
    }

    public function drawCard()
    {
        shuffle($this->deck);
        $card = array_shift($this->deck);

        return $card;
    }
}
