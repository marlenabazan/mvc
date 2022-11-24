<?php

namespace App\Card;

use App\Card\Card;

class Deck extends Card
{
    /**
     * deck
     *
     * @var array<Card>
     */
    protected $deck = array();

    /**
     * deckStr
     *
     * @var array<string>
     */
    protected $deckStr = array();

    /**
     * suits
     *
     * @var array<string>
     */
    private array $suits = array(
        'H',
        'D',
        'C',
        'S'
    );

    /**
     * faces
     *
     * @var array<string>
     */
    private array $faces = array(
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

    /**
     * suit2Color
     *
     * @var array<string>
     */
    private array $suit2Color = array(
        "H" => Card::COLOR1,
        "D" => Card::COLOR1,
        "C" => Card::COLOR2,
        "S" => Card::COLOR2);

    /**
     * face2Value
     *
     * @var array<int>
     */
    private array $face2Value = array(
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
        "A" => 1
    );

    /**
     * __construct
     * @SuppressWarnings(PHPMD.MissingImport)
     */
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

    /**
     * getDeck
     *
     * @return array
     */
    public function getDeckStr()
    {
        foreach ($this->deck as $card) {
            $oneCard = ($card->face . $card->suit);
            $this->deckStr[] = $oneCard;
        }
        return $this->deckStr;
    }

    /**
     * getValueFromFace
     *
     * @param string $face
     * @return int
     */
    public function getValueFromFace($face)
    {
        return $this->face2Value[$face];
    }
}
