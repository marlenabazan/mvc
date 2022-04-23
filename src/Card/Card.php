<?php

namespace App\Card;

class Card
{
    protected const COLOR1 = 'red';
    protected const COLOR2 = 'black';

    protected $face;
    protected $suit;
    protected $color;

    public function __construct($face = '', $suit = '', $color = '')
    {
        $this->face = $face;
        $this->suit = $suit;
        $this->color = $color;
    }
}
