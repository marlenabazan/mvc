<?php

namespace App\Card;

class Card
{
    const COLOR1 = 'red';
    const COLOR2 = 'black';

    public $face;
    public $suit;
    public $color;

    function __construct($face='', $suit='', $color='')
    {
        $this->face = $face;
        $this->suit = $suit;
        $this->color = $color;
    }
}
