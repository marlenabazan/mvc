<?php

namespace App\Card;

class Card
{
    protected const COLOR1 = 'red';
    protected const COLOR2 = 'black';

    protected string $face;
    protected string $suit;
    protected string $color;
    protected int $value;

    public function __construct(int $value = 0, string $face = '', string $suit = '', string $color = '')
    {
        $this->face = $face;
        $this->suit = $suit;
        $this->color = $color;
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
