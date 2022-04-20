<?php

namespace App\Card;

class DeckWith2Jokers extends Deck
{

    public function getDeckWithJokers()
    {
        $deck = Deck::getDeck();
        array_push($deck, "joker1", "joker2");
        return $deck;
    }
}
