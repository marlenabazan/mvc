<?php

namespace App\Card;

class Card
{

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

    protected $deck = array();

    public function __construct()
    {
        foreach ($this->suits as $suit) {
            foreach ($this->faces as $face) {
                $deck[] = $face . $suit;
            }
        }
        $this->deck = $deck;
    }
}
