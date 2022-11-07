<?php

namespace App\Card;

class Hand extends Deck
{
    public $hand = array();

    public function __construct()
    {
        $this->hand = [];
    }

    public function addCard($card)
    {
        $this->hand[] = $card;
        // array_push($this->hand, $card);
    }
}
