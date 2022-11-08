<?php

namespace App\Card;

class DeckWith2Jokers extends Deck
{
    /**
     * getDeckWithJokers
     *
     * @return array<string>
     */
    public function getDeckWithJokers()
    {
        $deck = Deck::getDeckStr();
        array_push($deck, "joker1", "joker2");
        return $deck;
    }
}
