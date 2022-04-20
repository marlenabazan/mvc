<?php

namespace App\Card;

class Card
{
    // const COLOR1 = 'red';
    // const COLOR2 = 'black';

    // public $suit;       // The suit of the card
    // public $color;      // The color of the card
    // public $name;       // Name of the card
    // public $symbol;     // The number or symbol of the card
    // // public $ranking;    // The overal ranking of this card in its suit
    // public $image;      // The image for this card
    // public $backimage;  // The image of the backside of the card

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
