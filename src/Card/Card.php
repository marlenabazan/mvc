<?php

namespace App\Card;

class Card
{
    protected const COLOR1 = 'red';
    protected const COLOR2 = 'black';

    protected $face;
    protected $suit;
    protected $color;
    protected $value;

    public function __construct(int $value = 0, $face = '', $suit = '', $color = '')
    {
        $this->face = $face;
        $this->suit = $suit;
        $this->color = $color;
        $this->value = $value;
    }
}
