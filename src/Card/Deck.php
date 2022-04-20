<?php

namespace App\Card;

class Deck extends Card
{
    // public $suits = array(
    //     'S' =>"Spades",
    //     'H' => "Hearts",
    //     'C' => "Clubs",
    //     'D' => "Diamonds"
    // );

    // private $suits = array(
    //     'S',
    //     'H',
    //     'C',
    //     'D'
    // );

    // protected $faces = array(
    //     '2',
    //     '3',
    //     '4',
    //     '5',
    //     '6',
    //     '7',
    //     '8',
    //     '9',
    //     '10',
    //     'J',
    //     'Q',
    //     'K',
    //     'A'
    // );

    // protected $deck = array();

	// private	$namedRanks = array(
    //     "J"=>"Jack",
    //     "Q"=>"Queen",
    //     "K"=>"King",
    //     "A"=>"Ace"
    // );
    // private $suit2Color = array("Spades" => Card::COLOR2, "Hearts" => Card::COLOR1, "Clubs" => Card::COLOR2, "Diamonds" => Card::COLOR1);
    // private $specialCards = array("joker-b" => "Black Joker", "joker-r" => "Red Joker");

    // public function __construct()
    // {
    //     foreach ($this->suits as $suitAbbrev => $suit) {
    //         $ranking = 1;
    //         foreach ($this->suitsCards as $cardnumber) {
    //             $tempcard = new Card();
    //             $tempcard->suit = $suit;
    //             // $tempcard->color = $this->suit2Color[$suit];
    //             $tempcard->name = (isset($this->namedRanks[$cardnumber]) ? $this->namedRanks[$cardnumber] : $cardnumber). ' of '.$suit;
    //             $tempcard->symbol = $cardnumber;
    //             $tempcard->ranking = $ranking++;
    //             $tempcard->image = 'img/cards_img/'.$cardnumber.'-'.$suitAbbrev.'.svg';
    //             // $tempcard->backimage = 'images/normal/facedown.jpg';
    //
    //             $this->deck[] = $tempcard;
    //         }
    //     }
    // }

    // public function __construct()
    // {
    //     foreach ($this->suits as $suit) {
    //         foreach ($this->faces as $face) {
    //             $deck[] = $face . $suit;
    //         }
    //     }
    //     $this->deck = $deck;
    // }

    public function __construct()
    {
        parent::__construct();
    }

    public function getDeck()
    {
        return $this->deck;
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
    //
    // public function getRemainingCardCount()
    // {
    //     return count($this->deck);
    // }

}

//     public function roll(): int
//     {
//         $this->value = random_int(1, 6);
//         return $this->value;
//     }
//
//     public function getAsString(): string
//     {
//         return "[{$this->value}]";
//     }
// }
