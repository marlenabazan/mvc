<?php

namespace App\Card;

class Deck extends Card
{
    protected $deck = array();

    private $suits = array(
        'H',
        'D',
        'C',
        'S'
    );

    private $faces = array(
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        '10',
        'J',
        'Q',
        'K',
        'A'
    );

    private $suit2Color = array("H" => Card::COLOR1, "D" => Card::COLOR1, "C" => Card::COLOR2, "S" => Card::COLOR2);

    private $face2Value = array(
        "2" => 2,
        "3" => 3,
        "4" => 4,
        "5" => 5,
        "6" => 6,
        "7" => 7,
        "8" => 8,
        "9" => 9,
        "10" => 10,
        "J" => 11,
        "Q" => 12,
        "K" => 13,
        "A" => 14
    );

    public function __construct()
    {
        foreach ($this->suits as $suit) {
            foreach ($this->faces as $face) {
                $card = new \App\Card\Card();
                $card->face = $face;
                $card->suit = $suit;
                $card->color = $this->suit2Color[$suit];
                $card->value = $this->face2Value[$face];

                $this->deck[] = $card;
            }
        }
    }

    public function getDeck()
    {
        foreach ($this->deck as $card) {
            $oneCard = ($card->face . $card->suit);
            $this->deckStr[] = $oneCard;
        }
        return $this->deckStr;
    }
}
