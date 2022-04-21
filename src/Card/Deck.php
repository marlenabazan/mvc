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

    protected $faces = array(
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

    public function __construct()
    {
        foreach ($this->suits as $suit) {
            foreach ($this->faces as $face) {
                $card = new \App\Card\Card();
                $card->face = $face;
                $card->suit = $suit;
                $card->color = $this->suit2Color[$suit];

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
