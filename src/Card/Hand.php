<?php

namespace App\Card;

class Hand extends Deck
{
    public $hand = array();

    function __construct()
    {
        
    }

    // public function addToHand($card, $num)
    // {
    //     for ($i = 1; $i <= $num; $i++) {
    //         $this->hand[] = $card;
    //     }
    //
    // }

    // public function getAsString(): string
    // {
    //     $str = "";
    //     foreach ($this->hand as $card) {
    //         $str = $card->getAsString();
    //     }
    //     return $str;
    // }
}
