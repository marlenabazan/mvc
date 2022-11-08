<?php

namespace App\Card;

class Hand extends Deck
{
    /**
     * hand
     *
     * @var array<string>
     */
    public array $hand = array();

    public function __construct()
    {
        $this->hand = [];
    }

    public function addCard(string $card): void
    {
        $this->hand[] = $card;
    }
}
